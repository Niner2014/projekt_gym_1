<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Produkt;

class Document extends Model
{
    use HasFactory;

    
    protected $fillable = ['produkt_id', 'ilosc', 'cena', 'created_at'];

    
    public $timestamps = false;

    
    public function produkt()
    {
        return $this->belongsTo(Produkt::class, 'produkt_id');
    }
}
