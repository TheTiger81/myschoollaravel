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
        Schema::create('comunicazioni', function (Blueprint $table) {
            $table->id();
            $table->foreignId('mittente_id')->constrained('users');
            $table->foreignId('destinatario_id')->constrained('users');
            $table->text('testo');
            $table->boolean('letto')->default(false);
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comunicazioni');
    }
};
