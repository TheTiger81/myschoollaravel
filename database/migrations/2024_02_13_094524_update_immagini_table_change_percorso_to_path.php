<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateImmaginiTableChangePercorsoToPath extends Migration
{
    public function up()
    {
        Schema::table('immagini', function (Blueprint $table) {
            $table->renameColumn('url', 'percorso');
        });
    }

    public function down()
    {
        Schema::table('immagini', function (Blueprint $table) {
            $table->renameColumn('percorso', 'url');
        });
    }
}