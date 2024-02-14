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
        Schema::table('classi', function (Blueprint $table) {
            $table->renameColumn('anno_scolastico', 'anno_scolastico_id');
        });
    }
    
    public function down()
    {
        Schema::table('classi', function (Blueprint $table) {
            $table->renameColumn('anno_scolastico_id', 'anno_scolastico');
        });
    }
    
};
