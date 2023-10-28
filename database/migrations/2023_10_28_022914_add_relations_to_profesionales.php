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
        Schema::table('profesionales', function (Blueprint $table) {
            $table->foreign('id_clientes')->references('id')->on('clientes');

            $table->foreign('id_telefonos')->references('id')->on('telefonos'); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('profesionales', function (Blueprint $table) {
            //
        });
    }
};
