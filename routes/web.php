<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ForumController;
use App\Http\Controllers\SprzedazController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\GrafikController;
use Illuminate\Support\Facades\Route;
use App\Models\ListeKlienci;
use App\Models\Klient;


Route::middleware('auth')->group(function () {
    
    Route::get('/', function () {
        $search = request()->input('search'); 
        
        
        if ($search) {
            $klienci = ListeKlienci::where('imie', 'like', "%{$search}%")
                ->orWhere('nazwisko', 'like', "%{$search}%")
                ->orWhere('email', 'like', "%{$search}%")
                ->orWhere('telefon', 'like', "%{$search}%")
                ->get();
        } else {
            
            $klienci = ListeKlienci::all();
        }
        
        
        return view('simple', [
            'heading' => 'Bieżące logowanie',
            'variable' => $klienci, 
            'search' => $search,    
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

    Route::post('/sprzedaz', [SprzedazController::class, 'zapisz'])->name('sprzedaz.zapisz');

    Route::get('/rejestr', [SprzedazController::class, 'index'])->name('rejestr');
    Route::get('/rejestr/pdf', [SprzedazController::class, 'generujRejestrDobowy'])->name('rejestr.pdf');

    Route::get('/grafik', [GrafikController::class, 'index'])->name('grafik');
    Route::post('/grafik/zapisz', [GrafikController::class, 'zapisz'])->name('grafik.zapisz');





});


Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
