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
        Schema::create('beneficiarios', function (Blueprint $table) {
            $table->id();
            $table->string('Nombre'); // Nombre del beneficiario
            $table->string('Cedula'); // Cédula del beneficiario
            $table->enum('sexo', ['M', 'F']); // sexo del beneficiario
            $table->string('edad'); // edad del beneficiario
            $table->string('Direccion'); // Dirección del beneficiario
            $table->string('Telefono'); // Teléfono del beneficiario
            $table->string('Informe_Medico')->nullable(); // Informe Médico (archivo o referencia)
            $table->timestamps();
          

            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('beneficiarios');
    }
};
