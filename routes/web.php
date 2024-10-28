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

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

