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
        Schema::create('equipments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('insumo_id'); // Clave Foránea
            $table->string('Tipo'); // Tipo de equipo (Silla de ruedas, muleta, bastón, etc.)
            $table->string('Marca'); // Marca del equipo
            $table->string('Modelo'); // Modelo del equipo
            $table->string('Existencia'); // existencia
            $table->string('imagen')->default('parring.png'); // Imagen por defecto
            $table->enum('Estado', ['Bueno', 'Regular', 'Malo']); // Estado del equipo
            $table->foreign('insumo_id')->references('id')->on('insumos')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('equipo_medicos');
    }
};
