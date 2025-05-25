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
        Schema::create('pacientes', function (Blueprint $table) {
            $table->id();
            $table->string('cedula'); // Identificación del benefactor
            $table->string('Nombre'); // Nombre del benefactor
            $table->string('edad'); // edad  del paciente
            $table->enum('categoria', ['LACTANTE', 'EMBARAZADA','BAJO PESO','ADULTO MAYOR']); // 
            $table->enum('sexo', ['M', 'F']); //       
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pacientes');
    }
};
