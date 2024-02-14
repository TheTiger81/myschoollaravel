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
        Schema::create('scrutini', function (Blueprint $table) {
            $table->id();
            $table->foreignId('classe_id')->constrained('classi');
            $table->string('anno_scolastico');
            $table->string('periodo');
            $table->date('data_inizio');
            $table->date('data_fine');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('scrutini');
    }
};
