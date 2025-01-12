<?php

namespace App\Http\Controllers;

use App\Models\Klient;
use App\Models\ListeKlienci;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    
    public function showClientProfile($id)
    {
        $klient = ListeKlienci::findOrFail($id);
        return view('klient', compact('klient'));
    }

    
    public function updateClientData(Request $request, $id)
    {
        
        $request->validate([
            'telefon' => 'nullable|string|max:20',
            'waga' => 'nullable|numeric|min:0',
            'data_zapisania' => 'nullable|date',
            'notatki' => 'nullable|string',
        ]);

        
        $klient = ListeKlienci::findOrFail($id);

        
        $klient->telefon = $request->telefon ?? $klient->telefon; 
        $klient->waga = $request->waga ?? $klient->waga;
        $klient->data_zapisania = $request->data_zapisania ?? $klient->data_zapisania;
        $klient->notatki = $request->notatki ?? $klient->notatki;

        
        $klient->save();

        
        return redirect()->route('klient.showClientProfile', $klient->id)
                         ->with('success', 'Dane klienta zostały zaktualizowane pomyślnie.');
    }

    
    public function create()
    {
        return view('dodajklient');  
    }

    
    public function store(Request $request)
    {
        
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
            'profilowe' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048' 
        ]);

        
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


        if ($request->hasFile('profilowe')) {
            $file = $request->file('profilowe');
            $filename = time() . '.' . $file->getClientOriginalExtension(); 
            $file->storeAs('public/profile', $filename); 

            $klient->profilowe = 'profile/' . $filename;
        }

        $klient->save();

        return redirect()->route('klient.showClientProfile', $klient->id)
                         ->with('success', 'Klient został dodany pomyślnie.');
    }

    public function index(Request $request)
    {
        $search = $request->input('search');
        
        if ($search) {
            $klienci = ListeKlienci::where('imie', 'like', "%{$search}%")
                ->orWhere('nazwisko', 'like', "%{$search}%")
                ->orWhere('telefon', 'like', "%{$search}%")
                ->get();
        } else {
            $klienci = ListeKlienci::all();
        }

        return view('simple', [
            'heading' => 'Bieżące logowanie',
            'variable' => $klienci,
        ]);
    }
}

