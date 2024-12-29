<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produkt;

class ProductController extends Controller
{
    public function index()
    { 
        $produkty = Produkt::all(); 
        return view('magazyn', compact('produkty'));
        
    }
    public function sprzedaż()
    {
        $produkty = Produkt::all(); 

        return view('sprzedaz', compact('produkty'));
    }


    public function update(Request $request)
    {
        $data = $request->input('products');

        foreach ($data as $productId => $productData) {
            $produkt = Produkt::find($productId);
            if ($produkt) {
                if (isset($productData['stock'])) {
                    $produkt->stock = $productData['stock'];
                }

                $produkt->save();
            }
        }


        return redirect()->route('magazyn')->with('success', 'Stan magazynowy został zaktualizowany.');
    }
}
