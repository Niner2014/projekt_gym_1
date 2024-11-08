<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ListeKlienci extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'liste_klienci'; // Nazwa tabeli

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'imie',
        'nazwisko',
        'email',
        'telefon',
        'wiek',
        'waga',
        'wzrost',
        'plec',
        'data_zapisania',
        'aktywny',
        'notatki',
        'profilowe', 
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'data_zapisania' => 'date', // Castowanie daty zapisania do formatu date
        'aktywny' => 'boolean',     // Castowanie aktywności na typ boolean
    ];
}
