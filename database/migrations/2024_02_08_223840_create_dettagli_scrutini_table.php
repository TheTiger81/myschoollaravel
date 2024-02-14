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
        Schema::create('dettagli_scrutini', function (Blueprint $table) {
            $table->id();
            $table->foreignId('scrutinio_id')->constrained('scrutini');
            $table->foreignId('studente_id')->constrained('users');
            $table->foreignId('materia_id')->constrained('materie');
            $table->decimal('voto_finale', 5, 2);
            $table->text('osservazioni')->nullable();
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dettagli_scrutini');
    }
};
