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
        Schema::create('voti', function (Blueprint $table) {
            $table->id();
            $table->foreignId('studente_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('materia_id')->constrained('materie')->onDelete('cascade');
            $table->decimal('valutazione', 5, 2);
            $table->date('data');
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('voti');
    }
};
