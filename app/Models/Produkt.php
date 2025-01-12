<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produkt extends Model
{
    use HasFactory;

    
    protected $table = 'liste_produkty';
    
    
    public $timestamps = false;

    
    protected $fillable = ['name', 'price', 'stock', 'zdjecie'];

    /**
     * 
     *
     * @param int $quantitySold 
     * @return void
     */
    public function updateStock($quantitySold)
{
    
    if ($quantitySold <= 0) {
        throw new \InvalidArgumentException("Liczba sprzedanych sztuk musi być większa niż zero.");
    }

    
    if ($this->stock < $quantitySold) {
        throw new \Exception("Brak wystarczającej ilości produktów w magazynie.");
    }

    
    $this->stock -= $quantitySold;

    
    $this->save();
}

}
