<?php

use Illuminate\Support\Facades\Route;
use App\Models\Value;

use function PHPUnit\Framework\returnSelf;

Route::get('/', function () {
    return view('simple' , [
        'heading' => 'Bieżące logowanie',
        'variable' => value::all()
    ]);
});

Route::get('/simple/{id}', function ($id) {
    return view('value', [
        'value' => value::find($id)
    ]);
});
