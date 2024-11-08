<?php

namespace App\Http\Controllers;

use App\Models\ListeKlienci;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
        return view('dodajklient');  // Formularz do dodania klienta
    }

    // Metoda do przechwytywania danych z formularza i dodawania klienta do bazy danych
    public function store(Request $request)
    {
        // Walidacja danych wejściowych, w tym opcjonalnie pliku zdjęcia
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
            'profilowe' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048' // Walidacja pliku zdjęcia
        ]);
    
        // Tworzenie nowego klienta bez zdjęcia, żeby uzyskać jego ID
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
            'data_zapisania' => now(),
            'aktywny' => true,
        ]);
    
        if ($request->hasFile('profilowe')) {
            $file = $request->file('profilowe');
            $filename = time() . '.' . $file->getClientOriginalExtension();  // Generowanie unikalnej nazwy pliku
            $file->storeAs('public/profile', $filename);  // Przechowywanie pliku w folderze 'storage/app/public/profile'
            
            // Zapisanie ścieżki do zdjęcia w bazie danych
            $klient->profilowe = 'profile/' . $filename;
        }
    
        // Zapisanie klienta do bazy danych
        $klient->save();
        
    
        return redirect()->route('klient.showClientProfile', $klient->id)
                         ->with('success', 'Klient został dodany pomyślnie.');
    }
    
}
