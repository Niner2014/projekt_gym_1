<?php

namespace App\Http\Controllers;

use App\Models\ListeKlienci; // Importuj model
use Illuminate\Http\Request;

class ClientController extends Controller
{
    // Metoda do wyświetlania profilu klienta
    public function showClientProfile($id)
    {
        $klient = ListeKlienci::findOrFail($id); 

        return view('klient', compact('klient')); 
    }

    // Metoda do aktualizacji notatek klienta
    public function updateNotatki(Request $request, $id)
    {
        $request->validate([
            'notatki' => 'required|string',
        ]);

        $klient = ListeKlienci::findOrFail($id);
        
        $klient->notatki = $request->notatki;
        $klient->save(); 

        return redirect()->route('klient.showClientProfile', $klient->id)
                         ->with('success', 'Notatki zostały zaktualizowane pomyślnie.');
    }

    // Metoda do wyświetlania formularza dodawania klienta
    public function create()
    {
        return view('dodajklient');
    }

    // Metoda do przechwytywania danych z formularza i dodawania klienta do bazy danych
    public function store(Request $request)
    {
        $request->validate([
            'imie' => 'required|string|max:255',
            'nazwisko' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:liste_klienci,email',
            'telefon' => 'nullable|string|max:20',
            'wiek' => 'nullable|integer|min:0',
            'waga' => 'nullable|numeric|min:0',
            'wzrost' => 'nullable|numeric|min:0',
            'plec' => 'nullable|string|max:1',
            'notatki' => 'nullable|string',
            'data_zapisania' => 'nullable|date',
            'aktywny' => 'nullable|boolean',
        ]);

        // Tworzenie nowego klienta
        $klient = ListeKlienci::create([
            'imie' => $request->imie,
            'nazwisko' => $request->nazwisko,
            'email' => $request->email,
            'telefon' => $request->telefon,
            'wiek' => $request->wiek,
            'waga' => $request->waga,
            'wzrost' => $request->wzrost,
            'plec' => $request->plec,
            'notatki' => $request->notatki,
            'data_zapisania' => now(), // Ustawiamy aktualną datę jako datę zapisu
            'aktywny' => true, // Domyślnie ustawiamy klienta jako aktywnego
        ]);

        return redirect()->route('klient.showClientProfile', $klient->id)
                         ->with('success', 'Klient został dodany pomyślnie.');
    }
}
