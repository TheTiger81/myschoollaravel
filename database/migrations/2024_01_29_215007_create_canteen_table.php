<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('canteen', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')->constrained('students')->onDelete('cascade');
            $table->date('date');
            $table->string('meal_type'); // Ad esempio, colazione, pranzo, cena
            $table->text('menu');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('canteen');
    }
};

