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
        Schema::create('anni_scolastici', function (Blueprint $table) {
            $table->id();
            $table->string('anno_scolastico'); // es. "2023/2024"
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
        Schema::dropIfExists('anni_scolastici');
    }
};
