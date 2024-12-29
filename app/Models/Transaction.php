<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $table = 'transactions';  // Nazwa tabeli w bazie danych
    protected $fillable = ['description', 'total_price'];  // Pola, które chcemy wypełnić
}