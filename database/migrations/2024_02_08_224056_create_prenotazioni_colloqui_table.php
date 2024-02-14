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
        Schema::create('prenotazioni_colloqui', function (Blueprint $table) {
            $table->id();
            $table->foreignId('colloquio_id')->constrained('colloqui');
            $table->foreignId('genitore_id')->constrained('users');
            $table->dateTime('data_ora_prenotazione');
            $table->string('stato');
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prenotazioni_colloqui');
    }
};
