<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Authenticatable;

class Uzytkownik extends Model implements AuthenticatableContract
{
    use HasFactory, Authenticatable;

    protected $table = 'uzytkownik'; // Upewnij się, że wskazuje na odpowiednią tabelę

    protected $fillable = ['name', 'password']; // Dodaj pola, które mogą być masowo przypisane

    // Jeśli używasz pamięci podręcznej, dodaj inne kolumny, które chcesz mieć
    protected $hidden = ['password']; // Ukryj hasło przy pobieraniu
}