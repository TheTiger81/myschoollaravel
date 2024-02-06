<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContattiTable extends Migration
{
    public function up()
    {
        Schema::create('contatti', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('cognome');
            $table->string('telefono')->nullable();
            $table->string('email');
            $table->text('messaggio');
            $table->timestamps(); // Crea i campi `created_at` e `updated_at`
        });
    }

    public function down()
    {
        Schema::dropIfExists('contatti');
    }
}
