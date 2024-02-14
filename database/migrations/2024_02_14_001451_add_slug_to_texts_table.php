<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('texts', function (Blueprint $table) {
            $table->string('slug')->unique()->after('title'); // Assicurati di inserire la colonna nella posizione che preferisci
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('texts', function (Blueprint $table) {
            $table->dropColumn('slug');
        });
    }
};
