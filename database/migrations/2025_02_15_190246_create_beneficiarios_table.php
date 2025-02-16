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
            $table->id('ID_Beneficiario'); // Clave Primaria
            $table->string('Nombre'); // Nombre del beneficiario
            $table->string('Cedula')->unique(); // Cédula del beneficiario
            $table->date('Fecha_Nacimiento'); // Fecha de Nacimiento
            $table->string('Direccion'); // Dirección del beneficiario
            $table->string('Telefono'); // Teléfono del beneficiario
            $table->string('Informe_Medico')->nullable(); // Informe Médico (archivo o referencia)
            $table->timestamps(); // created_at y updated_at
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
