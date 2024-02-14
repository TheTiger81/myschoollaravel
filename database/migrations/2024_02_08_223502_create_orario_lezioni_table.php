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
        Schema::create('orario_lezioni', function (Blueprint $table) {
            $table->id();
            $table->foreignId('classe_id')->constrained('classi')->onDelete('cascade');
            $table->foreignId('materia_id')->constrained('materie')->onDelete('cascade');
            $table->string('giorno_della_settimana');
            $table->time('ora_inizio');
            $table->time('ora_fine');
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orario_lezioni');
    }
};
