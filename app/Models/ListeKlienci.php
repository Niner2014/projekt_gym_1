<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class ListeKlienci extends Model
{
    use HasFactory;

    protected $table = 'liste_klienci';

    protected $fillable = [
        'imie',
        'nazwisko',
        'email',
        'telefon',
        'data_urodzenia',
        'waga',
        'wzrost',
        'plec',
        'data_zapisania',
        'aktywny',
        'notatki',
        'profilowe', 
    ];

    protected $casts = [
        'data_zapisania' => 'date',
        'data_urodzenia' => 'date',
        'aktywny' => 'boolean',
    ];

    // Metoda, która sprawdza, czy klient jest aktywny w zależności od daty zapisania
    public function getCzyAktywnyAttribute()
    {
        return Carbon::parse($this->data_zapisania)->addDays(30)->isFuture();
    }
}
