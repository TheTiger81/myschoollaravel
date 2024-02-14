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
        Schema::create('pagelle', function (Blueprint $table) {
            $table->id();
            $table->foreignId('scrutinio_id')->constrained('scrutini');
            $table->foreignId('studente_id')->constrained('users');
            $table->text('commento_generale')->nullable();
            $table->date('data_emissione');
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pagelle');
    }
};
