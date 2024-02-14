<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddGenitoreIdToStudentiTable extends Migration
{
    public function up()
    {
        Schema::table('studenti', function (Blueprint $table) {
            $table->unsignedBigInteger('genitore_id')->nullable(); // Rendi nullable se uno studente può non avere un genitore associato
            $table->foreign('genitore_id')->references('id')->on('genitori')->onDelete('set null'); // o 'cascade' se preferisci eliminare gli studenti quando si elimina il genitore
        });
    }

    public function down()
    {
        Schema::table('studenti', function (Blueprint $table) {
            $table->dropForeign(['genitore_id']);
            $table->dropColumn('genitore_id');
        });
    }
}

