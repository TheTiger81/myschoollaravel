<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Esegue la migrazione per creare la tabella 'classes'.
     */
    public function up(): void
    {
        // Creazione della tabella 'classes'
        Schema::create('classes', function (Blueprint $table) {
            $table->id(); // Chiave primaria
            $table->string('grade'); // Grado della classe (es: asilo, prima, seconda, ecc.)
            $table->foreignId('section_id')->nullable()->constrained('sections')->onDelete('set null'); // Relazione con sezioni (nullable)
            $table->foreignId('teacher_id')->nullable()->constrained('teachers')->onDelete('set null'); // Relazione con insegnanti (nullable)
            $table->foreignId('class_register_id')->nullable()->constrained('class_registers')->onDelete('set null'); // Relazione con registri di classe (nullable)
            $table->timestamps(); // Timestamps per 'created_at' e 'updated_at'
        });

    }

    /**
     * Inverte la migrazione eliminando le tabelle create.
     */
    public function down(): void
    {
        Schema::dropIfExists('classes');
    }
};

