<?php
namespace App\Models;
class value {
    public static function all() {
        return [
            [
            'id' => 1,
            'tytul' => 'logowanie',
            'opis' => 'opis'
        ],
        [
             'id' => 2,
            'tytul' => 'hasło',
            'opis' => 'opis'
        ]
        ];
}
public static function find($id) {
    $simple = self::all();

    foreach ($simple as $value) {
        if ($value['id'] == $id) {
            return $value;
    }
}
}
}