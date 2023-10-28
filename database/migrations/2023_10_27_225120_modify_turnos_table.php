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
        Schema::table('turnos', function (Blueprint $table) {
            $table->unsignedBigInteger('id_clientes');
            $table->unsignedBigInteger('id_profesionales');

            $table->timestamps();
            $table->softDeletes();

             $table->foreign('id_clientes')->references('id')->on('clientes');

            $table->foreign('id_profesionales')->references('id')->on('profesionales');
            
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('turnos', function (Blueprint $table) {
            $table->dropForeign(['id_clientes']);
            $table->dropForeign(['id_profesionales']);
        });
    }
};
