<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('liste_klienci', function (Blueprint $table) {
            $table->id(); // Unikalny identyfikator klienta
            $table->string('imie'); // Imię klienta
            $table->string('nazwisko'); // Nazwisko klienta
            $table->string('email')->unique(); // Unikalny adres e-mail
            $table->string('telefon', 9)->nullable(); // Opcjonalny numer telefonu z maksymalną długością 9 znaków
            $table->integer('wiek')->nullable(); // Wiek klienta 
            $table->decimal('waga', 5, 2)->nullable(); // Waga klienta (opcjonalnie)
            $table->decimal('wzrost', 5, 2)->nullable(); // Wzrost klienta (opcjonalnie)
            $table->string('plec'); // Płeć klienta
            $table->date('data_zapisania'); // Data zapisania do siłowni
            $table->boolean('aktywny')->default(true); // Status aktywności klienta (aktywny/nieaktywny)
            $table->text('notatki')->nullable(); // Opcjonalne notatki dotyczące klienta
            $table->string('profilowe')->nullable(); // Kolumna na nazwę pliku zdjęcia klienta
            $table->timestamps(); // Automatyczne pola created_at i updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('liste_klienci');
    }
};
