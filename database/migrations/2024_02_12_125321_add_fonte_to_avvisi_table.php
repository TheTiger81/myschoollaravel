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
        Schema::table('avvisi', function (Blueprint $table) {
            $table->string('fonte')->nullable()->after('autore'); // Assumiamo che la fonte possa essere opzionale
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('avvisi', function (Blueprint $table) {
            //
        });
    }
};
