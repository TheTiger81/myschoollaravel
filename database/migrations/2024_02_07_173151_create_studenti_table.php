<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentiTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('studenti', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('nome');
            $table->string('cognome');
            $table->string('email')->unique();
            $table->date('data_di_nascita');
            $table->string('nato_a');
            $table->string('residenza');
            $table->string('codice_fiscale')->unique();
            $table->string('telefono')->nullable();
            $table->string('cellulare');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('studenti');
    }
};
