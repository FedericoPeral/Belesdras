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
            $table->unsignedBigInteger('id_clientes');
            $table->unsignedBigInteger('id_telefonos');
            $table->string('telefono', 255)->change(); // 255 es la longitud máxima del campo
            $table->foreign('id_clientes')->references('id')->on('clientes');

            $table->foreign('id_telefonos')->references('id')->on('telefonos');           
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('turnos', function (Blueprint $table) {
            $table->dropForeign(['id_clientes']);
            $table->dropForeign(['telefonos']);
        });
    }
};
