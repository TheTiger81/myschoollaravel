<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateGenitoriTable extends Migration
{
    public function up()
    {
        Schema::table('genitori', function (Blueprint $table) {
            // Rinomina la colonna residenza in residente
            $table->renameColumn('residenza', 'residente');

            // Aggiungi le nuove colonne
            $table->string('indirizzo');
            $table->string('cap');
            $table->string('provincia');
        });
    }

    public function down()
    {
        Schema::table('genitori', function (Blueprint $table) {
            // Per rollback: rinomina residente in residenza e rimuovi le nuove colonne
            $table->renameColumn('residente', 'residenza');
            $table->dropColumn(['indirizzo', 'cap', 'provincia']);
        });
    }
}
