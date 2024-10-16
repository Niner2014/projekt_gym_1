<?php
namespace App\Models;
class value {
    public static function all() {
        return [
            [
            'id' => 1,
            'tytul' => '1',
            'opis' => 'opis'
        ],
        [
             'id' => 2,
            'tytul' => '2',
            'opis' => 'opis'
        ],
        [
            'id' => 3,
           'tytul' => 'hasło',
           'opis' => 'opis'
        ],
        [
        'id' => 4,
       'tytul' => 'hasło',
       'opis' => 'opis'
        ],
        [
        'id' => 5,
        'tytul' => 'hasło',
        'opis' => 'opis'
        ],
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