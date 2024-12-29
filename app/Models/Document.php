<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Produkt;

class Document extends Model
{
    use HasFactory;

    // Określenie, które pola mogą być masowo przypisywane
    protected $fillable = ['produkt_id', 'ilosc', 'cena', 'created_at'];

    // Określenie, że model nie używa domyślnych timestampów
    public $timestamps = false;

    // Relacja do modelu Produkt
    public function produkt()
    {
        return $this->belongsTo(Produkt::class, 'produkt_id');
    }
}
