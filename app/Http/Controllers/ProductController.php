<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produkt;

class ProductController extends Controller
{
    public function index()
    {
        // Pobranie wszystkich produktów z bazy danych
        $produkty = Produkt::all(); 

        // Przekazanie produktów do widoku magazynowego
        return view('magazyn', compact('produkty'));
        
    }
    public function sprzedaż()
    {
        // Pobranie wszystkich produktów z bazy danych
        $produkty = Produkt::all(); 

        // Przekazanie produktów do widoku sprzedaży
        return view('sprzedaz', compact('produkty'));
    }


    public function update(Request $request)
    {
        // Pobieramy dane z formularza (produkty i ich stany)
        $data = $request->input('products');

        // Iterujemy po produktach i aktualizujemy stan magazynowy
        foreach ($data as $productId => $productData) {
            $produkt = Produkt::find($productId);
            if ($produkt) {
                // Sprawdzamy i aktualizujemy stan magazynowy
                if (isset($productData['stock'])) {
                    $produkt->stock = $productData['stock'];
                }

                // Zapisanie zmian w bazie danych
                $produkt->save();
            }
        }

        // Przekazanie komunikatu o sukcesie i powrót do strony magazynowej
        return redirect()->route('magazyn')->with('success', 'Stan magazynowy został zaktualizowany.');
    }
}
