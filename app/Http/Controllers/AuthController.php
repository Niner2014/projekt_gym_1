<?php

namespace App\Http\Controllers;

use App\Models\Uzytkownik;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function showRegistrationForm()
    {
        return view('register'); // Upewnij się, że ta linia jest poprawna
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $uzytkownik = Uzytkownik::create([
            'name' => $request->name,
            'password' => bcrypt($request->password),
        ]);

        return redirect()->route('login')->with('success', 'Rejestracja zakończona pomyślnie!');
    }

    public function showLoginForm()
    {
        return view('login'); // Upewnij się, że ta linia jest poprawna
    }

    public function login(Request $request)
    {
        // Walidacja danych logowania
        $request->validate([
            'name' => 'required|string',
            'password' => 'required|string',
        ]);

        // Próba zalogowania użytkownika
        if (auth()->attempt(['name' => $request->name, 'password' => $request->password])) {
            // Po udanym logowaniu przekieruj do strony głównej
            return redirect('/'); // Użyj '/' aby wrócić do głównej trasy
        }

        // Jeśli nie udało się zalogować, przekieruj z błędem
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
