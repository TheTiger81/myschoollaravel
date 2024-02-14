<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('annunci', function (Blueprint $table) {
        $table->id();
        $table->string('titolo');
        $table->text('descrizione');
        $table->string('immagine')->nullable(); // Opzionale: percorso dell'immagine dell'annuncio
        $table->enum('canale_pubblicazione', ['sito', 'facebook', 'notifica'])->default('sito');
        $table->text('note')->nullable(); // Colonna aggiuntiva per le note
        $table->timestamps(); // Crea automaticamente le colonne `created_at` e `updated_at`
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('annuncios');
    }
};
