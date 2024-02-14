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
        Schema::table('voti', function (Blueprint $table) {
            $table->foreignId('anno_scolastico_id')->after('id')->constrained('anni_scolastici')->onDelete('cascade');
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('voti', function (Blueprint $table) {
            //
        });
    }
};
