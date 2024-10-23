<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\ListeKlienci::factory(10)->create(); // Użyj fabryki dla liste_uzytkownicy
    }
}
