<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produkt extends Model
{
    use HasFactory;

    // Nazwa tabeli przypisana do modelu (jeśli jest inna niż domyślna)
    protected $table = 'liste_produkty';
    
    // Wyłącz zarządzanie timestampami
    public $timestamps = false;

    // Kolumny, które mogą być masowo przypisywane
    protected $fillable = ['name', 'price', 'stock', 'zdjecie'];

    /**
     * Aktualizuje stan magazynowy po sprzedaży.
     *
     * @param int $quantitySold Liczba sprzedanych sztuk
     * @return void
     */
    public function updateStock($quantitySold)
{
    // Sprawdza, czy liczba sprzedanych sztuk jest większa od zera
    if ($quantitySold <= 0) {
        throw new \InvalidArgumentException("Liczba sprzedanych sztuk musi być większa niż zero.");
    }

    // Sprawdza, czy jest wystarczająca ilość produktów w magazynie
    if ($this->stock < $quantitySold) {
        throw new \Exception("Brak wystarczającej ilości produktów w magazynie.");
    }

    // Zmniejsza stan magazynowy o liczbę sprzedanych sztuk
    $this->stock -= $quantitySold;

    // Zapisuje zmiany w bazie danych
    $this->save();
}

}
