<?php

namespace App\Http\Controllers;

use App\Models\Klient;
use App\Models\ListeKlienci;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    // Metoda do wyświetlania profilu klienta
    public function showClientProfile($id)
    {
        $klient = ListeKlienci::findOrFail($id);
        return view('klient', compact('klient'));
    }

    // Metoda do aktualizacji danych klienta (telefon, waga, data zapisu, notatki)
    public function updateClientData(Request $request, $id)
    {
        // Walidacja danych wejściowych
        $request->validate([
            'telefon' => 'nullable|string|max:20',
            'waga' => 'nullable|numeric|min:0',
            'data_zapisania' => 'nullable|date',
            'notatki' => 'nullable|string',
        ]);

        // Wyszukiwanie klienta w bazie danych
        $klient = ListeKlienci::findOrFail($id);

        // Aktualizacja danych klienta
        $klient->telefon = $request->telefon ?? $klient->telefon; // Jeśli nie podano nowego numeru, pozostaje poprzedni
        $klient->waga = $request->waga ?? $klient->waga;
        $klient->data_zapisania = $request->data_zapisania ?? $klient->data_zapisania;
        $klient->notatki = $request->notatki ?? $klient->notatki;

        // Zapisanie zmian w bazie danych
        $klient->save();

        // Przekierowanie z informacją o powodzeniu
        return redirect()->route('klient.showClientProfile', $klient->id)
                         ->with('success', 'Dane klienta zostały zaktualizowane pomyślnie.');
    }

    // Metoda do wyświetlania formularza dodawania klienta
    public function create()
    {
        return view('dodajklient');  // Formularz do dodania klienta
    }

    // Metoda do przechwytywania danych z formularza i dodawania klienta do bazy danych
    public function store(Request $request)
    {
        // Walidacja danych wejściowych
        $request->validate([
            'imie' => 'required|string|max:255',
            'nazwisko' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:liste_klienci,email',
            'telefon' => 'nullable|string|max:20',
            'data_urodzenia' => 'nullable|date',
            'waga' => 'nullable|numeric|min:0',
            'wzrost' => 'nullable|numeric|min:0',
            'plec' => 'nullable|string|max:1',
            'notatki' => 'nullable|string',
            'data_zapisania' => 'nullable|date',
            'aktywny' => 'nullable|boolean',
            'profilowe' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048' // Walidacja pliku zdjęcia
        ]);

        // Tworzenie nowego klienta
        $klient = ListeKlienci::create([
            'imie' => $request->imie,
            'nazwisko' => $request->nazwisko,
            'email' => $request->email,
            'telefon' => $request->telefon,
            'data_urodzenia' => $request->data_urodzenia,
            'waga' => $request->waga,
            'wzrost' => $request->wzrost,
            'plec' => $request->plec,
            'notatki' => $request->notatki,
            'data_zapisania' => now(),
            'aktywny' => true,
        ]);

        // Obsługa zdjęcia profilowego
        if ($request->hasFile('profilowe')) {
            $file = $request->file('profilowe');
            $filename = time() . '.' . $file->getClientOriginalExtension();  // Generowanie unikalnej nazwy pliku
            $file->storeAs('public/profile', $filename);  // Przechowywanie pliku w folderze 'storage/app/public/profile'

            // Zapisanie ścieżki do zdjęcia w bazie danych
            $klient->profilowe = 'profile/' . $filename;
        }

        // Zapisanie klienta do bazy danych
        $klient->save();

        // Przekierowanie z komunikatem o sukcesie
        return redirect()->route('klient.showClientProfile', $klient->id)
                         ->with('success', 'Klient został dodany pomyślnie.');
    }

    public function index(Request $request)
    {
        // Pobieramy wyszukiwaną frazę z formularza
        $search = $request->input('search');
        
        // Jeśli fraza jest podana, wykonujemy zapytanie wyszukujące w bazie
        if ($search) {
            $klienci = ListeKlienci::where('imie', 'like', "%{$search}%")
                ->orWhere('nazwisko', 'like', "%{$search}%")
                ->orWhere('telefon', 'like', "%{$search}%")
                ->get();
        } else {
            // Jeśli fraza nie jest podana, pobieramy wszystkich klientów
            $klienci = ListeKlienci::all();
        }

        // Zwracamy widok z wynikami wyszukiwania
        return view('simple', [
            'heading' => 'Bieżące logowanie',
            'variable' => $klienci,
        ]);
    }
}

