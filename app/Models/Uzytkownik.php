<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Uzytkownik extends Model
{
    use HasFactory;

    protected $table = 'użytkowniks'; // Nazwa tabeli

    protected $fillable = [
        'login',
        'hasło',
    ];
}
