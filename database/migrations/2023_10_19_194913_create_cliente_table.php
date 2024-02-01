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
        Schema::create('cliente', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('correo')->unique(); //Columna correo que sera unica
            $table->string('telefono')->nullable();
            $table->string('cuidad');
            $table->string('folio')->unique(); //Columna folio que sera unica
            $table->decimal('pagos', 10, 2); //Decimal 10 digitos y 2 decimales
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cliente');
    }
};
