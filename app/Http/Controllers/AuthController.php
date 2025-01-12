<?php

namespace App\Http\Controllers;

use App\Models\Uzytkownik;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function showRegistrationForm()
    {
        return view('register'); 
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'password' => 'required|string|min:8|confirmed',
            'admin_code' => 'required|string', 
        ]);
        
        if ($request->admin_code !== 'Admin218') {
            return back()->withErrors(['admin_code' => 'Kod dostępu admina jest nieprawidłowy.']);
        }

        $uzytkownik = Uzytkownik::create([
            'name' => $request->name,
            'password' => bcrypt($request->password),
        ]);

        return redirect()->route('login')->with('success', 'Rejestracja zakończona pomyślnie!');
    }

    public function showLoginForm()
    {
        return view('login'); 
    }

    public function login(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'password' => 'required|string',
        ]);

        // Próba zalogowania użytkownika
        if (auth()->attempt(['name' => $request->name, 'password' => $request->password])) {
            return redirect('/'); 
        }

        return back()->withErrors([
            'name' => 'Podane dane są nieprawidłowe.',
        ]);
    }

    public function logout()
    {
        auth()->logout();
        return redirect()->route('login')->with('success', 'Wylogowano pomyślnie!');
    }
}
