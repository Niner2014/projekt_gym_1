<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Authenticatable;

class Uzytkownik extends Model implements AuthenticatableContract
{
    use HasFactory, Authenticatable;

    protected $table = 'uzytkownik'; 

    protected $fillable = ['name', 'password']; 

   
    protected $hidden = ['password']; 
}