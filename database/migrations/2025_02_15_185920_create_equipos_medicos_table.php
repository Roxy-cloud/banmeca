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
        Schema::create('equipos_medicos', function (Blueprint $table) {
            $table->id('ID_Equipo'); // Clave Primaria
            $table->string('Tipo'); // Tipo de equipo (Silla de ruedas, muleta, bastón, etc.)
            $table->string('Marca'); // Marca del equipo
            $table->string('Modelo'); // Modelo del equipo
            $table->enum('Estado', ['Bueno', 'Regular', 'Malo']); // Estado del equipo
            $table->timestamps(); // created_at y updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('equipos_medicos');
    }
};
