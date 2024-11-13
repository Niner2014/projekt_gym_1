<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ForumController;
use Illuminate\Support\Facades\Route;
use App\Models\ListeKlienci;

// Trasy wymagające logowania
Route::middleware('auth')->group(function () {
    Route::get('/', function () {
        return view('simple', [
            'heading' => 'Bieżące logowanie',
            'variable' => ListeKlienci::all() 
        ]);
    });

    Route::get('/simple/{imie}-{nazwisko}', function ($imie, $nazwisko) {
        return view('klient', [
            'klient' => ListeKlienci::where('imie', $imie)->where('nazwisko', $nazwisko)->firstOrFail() 
        ]);
    });

    Route::get('/regulamin', function () {
        return view('regulamin');
    })->name('regulamin');

    Route::get('/sprzedaz', [ProductController::class, 'sprzedaż'])->name('sprzedaz');

    Route::get('/magazyn', [ProductController::class, 'index'])->name('magazyn');
    Route::put('/magazyn/update', [ProductController::class, 'update'])->name('magazyn.update');
    
    Route::get('/dodaj-klienta', [ClientController::class, 'create'])->name('dodajklient');
    Route::post('/klient', [ClientController::class, 'store'])->name('klient.store');

    Route::get('/klient/{id}', [ClientController::class, 'showClientProfile'])->name('klient.showClientProfile');
    Route::put('/klient/{id}/aktualizuj', [ClientController::class, 'updateClientData'])->name('klient.updateClientData');

    Route::get('/forum', [ForumController::class, 'index'])->name('forum');
    Route::post('/forum', [ForumController::class, 'store'])->name('forum.store');

});

// Trasy publiczne - logowanie i rejestracja
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
