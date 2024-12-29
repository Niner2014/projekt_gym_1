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

            // Aktualizacja stanu magazynowego
            $produkt->stock -= $item['ilosc'];
            $produkt->save();

            // Tworzenie opisu sprzedaży
            $opisSprzedazy[] = "{$item['ilosc']}x {$produkt->name}";
            $sumaTransakcji += $produkt->price * $item['ilosc'];
        }

        // Zapis opisu i sumy transakcji do tabeli 'transaction'
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

    // Metoda generująca PDF
    public function generujRejestrDobowy()
    {
        // Pobierz dane sprzedaży tylko z danego dnia
        $sprzedaz = Transaction::whereDate('created_at', now()->toDateString())->get();

        // Przygotowanie danych dla raportu
        $produkty = $sprzedaz->map(function ($item) {
            return [
                'description' => $item->description, // Opis sprzedaży
                'total_price' => $item->total_price, // Całkowita suma
            ];
        });

        // Oblicz sumę wszystkich transakcji z dnia
        $sumaZmian = $produkty->sum('total_price');

        // Stwórz widok PDF
        $pdf = PDF::loadView('rejestr_dobowy', compact('produkty', 'sumaZmian'));

        // Generuj nazwę pliku z datą
        $fileName = 'rejestr_dobowy_' . now()->toDateString() . '.pdf';

        // Zapisz PDF w folderze public/storage/documents
        $path = 'documents/' . $fileName; // Zapisz ścieżkę względną
        Storage::put('public/' . $path, $pdf->output()); // Użyj folderu public

        // Zapisz rekord w bazie danych
        $document = new Document();
        $document->pdf_path = $path; // Ścieżka do pliku w folderze storage
        $document->name = $fileName; // Nazwa pliku
        $document->save();

        // Zwróć PDF do przeglądarki jako podgląd
        return response()->file(storage_path('app/public/' . $path), [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="' . $fileName . '"',
        ]);
    }
     // Metoda do wyświetlania strony rejestru
     public function index()
     {
         // Pobierz dokumenty z bazy danych (np. wszystkie lub na podstawie jakiegoś warunku)
         $documents = Document::whereYear('created_at', now()->year)
                         ->orderBy('created_at', 'desc')
                         ->get();
         // Przekaż dokumenty do widoku
         return view('rejestr', compact('documents'));
     }
    
}