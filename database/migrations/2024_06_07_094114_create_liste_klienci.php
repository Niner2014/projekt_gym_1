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
            $table->id(); 
            $table->string('imie'); 
            $table->string('nazwisko'); 
            $table->string('email')->unique(); 
            $table->string('telefon', 9)->nullable(); 
            $table->integer('wiek')->nullable(); 
            $table->decimal('waga', 5, 2)->nullable(); 
            $table->decimal('wzrost', 5, 2)->nullable(); 
            $table->string('plec'); 
            $table->date('data_zapisania'); 
            $table->boolean('aktywny')->default(true); 
            $table->text('notatki')->nullable(); 
            $table->string('profilowe')->nullable(); 
            $table->timestamps(); 
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
