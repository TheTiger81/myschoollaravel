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
        Schema::create('assenze', function (Blueprint $table) {
            $table->id();
            $table->foreignId('studente_id')->constrained('users')->onDelete('cascade');
            $table->date('data');
            $table->boolean('giustificata')->default(false);
            $table->timestamps();
        });
    }        

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('assenze');
    }
};
