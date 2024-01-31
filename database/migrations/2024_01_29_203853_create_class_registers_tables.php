<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('class_registers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('section_id')->constrained('sections');
            $table->foreignId('teacher_id')->nullable()->constrained('teachers')->onDelete('set null');
            $table->date('date'); // Data della lezione
            $table->string('academic_year'); // Anno scolastico, es. '2024-2025'
            $table->timestamps();
        });


    }

    public function down(): void
    {
        
        Schema::dropIfExists('class_registers');
    }
};