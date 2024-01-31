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
        // Tabella pivot per la relazione tra classi e studenti
        Schema::create('class_student', function (Blueprint $table) {
            $table->id();
            $table->foreignId('classes_id')->constrained('classes')->onDelete('cascade'); // Relazione con la classe
            $table->foreignId('student_id')->constrained('students')->onDelete('cascade'); // Relazione con lo studente
            $table->timestamps();
        });

        
        // Creazione delle tabelle pivot per le relazioni

        // Relazione con le classi
        Schema::create('teacher_class', function (Blueprint $table) {
            $table->id();
            $table->foreignId('teacher_id')->constrained('teachers')->onDelete('cascade');
            $table->foreignId('classes_id')->constrained('classes')->onDelete('cascade');
            $table->timestamps();
        });

        // Relazione con le sezioni
        Schema::create('teacher_section', function (Blueprint $table) {
            $table->id();
            $table->foreignId('teacher_id')->constrained('teachers')->onDelete('cascade');
            $table->foreignId('section_id')->constrained('sections')->onDelete('cascade');
            $table->timestamps();
        });

        // Relazione con i registri di classe
        Schema::create('teacher_class_register', function (Blueprint $table) {
            $table->id();
            $table->foreignId('teacher_id')->constrained('teachers')->onDelete('cascade');
            $table->foreignId('class_register_id')->constrained('class_registers')->onDelete('cascade');
            $table->timestamps();
        });

        // Relazione con gli studenti (se necessario)
        Schema::create('teacher_student', function (Blueprint $table) {
            $table->id();
            $table->foreignId('teacher_id')->constrained('teachers')->onDelete('cascade');
            $table->foreignId('student_id')->constrained('students')->onDelete('cascade');
            $table->timestamps();
        });

 

        // Tabella per l'orario di classe (class_schedule)
        Schema::create('class_schedule', function (Blueprint $table) {
            $table->id();
            $table->foreignId('class_register_id')->constrained('class_registers')->onDelete('cascade');
            $table->foreignId('subject_id')->constrained('subjects')->onDelete('cascade');
            $table->string('day'); // Giorno della settimana
            $table->time('start_time'); // Ora di inizio lezione
            $table->time('end_time'); // Ora di fine lezione
            $table->timestamps();
        });

        Schema::create('class_register_student', function (Blueprint $table) {
            $table->id();
            $table->foreignId('class_register_id')->constrained('class_registers')->onDelete('cascade');
            $table->foreignId('student_id')->constrained('students')->onDelete('cascade');
            $table->date('date'); // Data della lezione
            $table->boolean('presence')->default(true); // Presenza/assenza
            $table->text('daily_notes')->nullable(); // Note giornaliere
            $table->timestamps();
        });
        
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('class_register_student');
        Schema::dropIfExists('class_schedule');
        Schema::dropIfExists('teacher_subject');
        Schema::dropIfExists('class_student');
        Schema::dropIfExists('teacher_student');
        Schema::dropIfExists('teacher_class_register');
        Schema::dropIfExists('teacher_section');
        Schema::dropIfExists('teacher_class');
    }
};

