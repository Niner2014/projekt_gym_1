<?php
namespace App\Http\Controllers;

use App\Models\Document;
use App\Models\Produkt;
use App\Models\Transaction;
use Barryvdh\DomPDF\Facade\pdf as PDF;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

class SprzedazController extends Controller
{
    public function zapisz(Request $request)
    {
        $koszyk = $request->input('koszyk');
        $opisSprzedazy = [];
        $sumaTransakcji = 0;

        foreach ($koszyk as $item) {
            $produktId = str_replace('product', '', $item['produktId']);
            $produkt = Produkt::find($produktId);

            if (!$produkt || $produkt->stock < $item['ilosc']) {
                return response()->json(['message' => 'Brak wystarczającej ilości produktu.'], 400);
            }

            
            $produkt->stock -= $item['ilosc'];
            $produkt->save();

            
            $opisSprzedazy[] = "{$item['ilosc']}x {$produkt->name}";
            $sumaTransakcji += $produkt->price * $item['ilosc'];
        }

        
        $transaction = new Transaction();
        $transaction->description = implode(', ', $opisSprzedazy);
        $transaction->total_price = $sumaTransakcji;
        $transaction->save();

        return response()->json([
            'message' => 'Sprzedaż zrealizowana pomyślnie.',
            'description' => $transaction->description,
            'total_price' => $transaction->total_price,
        ]);
    }

    
    public function generujRejestrDobowy()
    {
        
        $sprzedaz = Transaction::whereDate('created_at', now()->toDateString())->get();

        
        $produkty = $sprzedaz->map(function ($item) {
            return [
                'description' => $item->description, 
                'total_price' => $item->total_price, 
            ];
        });

        
        $sumaZmian = $produkty->sum('total_price');

        
        $pdf = PDF::loadView('rejestr_dobowy', compact('produkty', 'sumaZmian'));

        
        $fileName = 'rejestr_dobowy_' . now()->toDateString() . '.pdf';

        
        $path = 'documents/' . $fileName; 
        Storage::put('public/' . $path, $pdf->output()); 
        
        $document = new Document();
        $document->pdf_path = $path; 
        $document->name = $fileName; 
        $document->save();

        
        return response()->file(storage_path('app/public/' . $path), [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="' . $fileName . '"',
        ]);
    }
     
     public function index()
     {
         
         $documents = Document::whereYear('created_at', now()->year)
                         ->orderBy('created_at', 'desc')
                         ->get();
         
         return view('rejestr', compact('documents'));
     }
    
}