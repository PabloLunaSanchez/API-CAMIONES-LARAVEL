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
        Schema::create('viajes', function (Blueprint $table) {
            $table->id();
            $table->integer('Kilometros'); //kilometros que se recorren
            $table->string('ciudad_origen'); //cuidad de origen
            $table->string('ciudad_destino'); //cuidad de destino
            $table->date('fecha_salida'); //fecha de salida
            $table->date('fecha_llegada'); //fecha de llegada
            $table->double('gasolina'); //disel o gasolina
            $table->double('peaje'); //casetas
            $table->double('carga'); //tonelage de la carga
            $table->double('comida'); //comida
            $table->double('federales'); //federales

            $table->double('total'); //total de gastos

            $table->timestamps();

          
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('viajes');
    }
};
