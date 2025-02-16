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
        Schema::create('donaciones', function (Blueprint $table) {
            $table->id('ID_Donacion'); // Clave Primaria
            $table->unsignedBigInteger('ID_Benefactor'); // Clave Foránea
            $table->dateTime('Fecha_Donacion'); // Fecha de la Donación
            $table->text('Descripcion')->nullable(); // Descripción de la Donación
            $table->timestamps(); // created_at y updated_at

            // Definir la relación de clave foránea
            $table->foreign('ID_Benefactor')->references('ID_Benefactor')->on('benefactors');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('donaciones');
    }
};
