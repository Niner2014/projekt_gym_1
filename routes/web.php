<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Models\ListeKlienci;

Route::get('/', function () {
    return view('simple', [
        'heading' => 'Bieżące logowanie',
        'variable' => ListeKlienci::all() // Upewnij się, że używasz poprawnej nazwy modelu
    ]);
});

Route::get('/simple/{id}', function ($id) {
    return view('klient', [
        'klient' => ListeKlienci::find($id) // Upewnij się, że używasz poprawnej nazwy modelu
    ]);
});

Route::get('/login', function () {
    return view('login');
})->name('login');