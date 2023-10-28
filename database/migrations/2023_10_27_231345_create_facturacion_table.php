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
        Schema::create('facturacion', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_profesionales');
            $table->unsignedBigInteger('id_clientes');
            $table->unsignedBigInteger('id_turnos');

            $table->string('fac_encabezado');
            $table->float('precio_unitario');
            $table->float('precio_total');
            $table->string('domicilio');
            $table->string('logo');
            $table->integer('descuento');
            $table->string('turno');
            $table->timestamps();   

            $table->foreign('id_clientes')->references('id')->on('clientes');


            $table->foreign('id_turnos')->references('id')->on('turnos');

            $table->foreign('id_profesionales')->references('id')->on('profesionales');



        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('facturacion');
    }
};
