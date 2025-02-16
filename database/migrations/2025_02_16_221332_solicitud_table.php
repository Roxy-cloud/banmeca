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
        Schema::create('solicitudes', function (Blueprint $table) {
            $table->id('ID_Solicitud'); // Clave Primaria
            $table->enum('Tipo_Solicitud', ['Donacion_Medicina', 'Comodato_EquipoMedico']); // Tipo de solicitud
            $table->unsignedBigInteger('ID_Medicamento')->nullable(); // Clave Foránea (si es donación de medicina)
            $table->unsignedBigInteger('ID_EquipoMedico')->nullable(); // Clave Foránea (si es comodato de equipo médico)
            $table->unsignedBigInteger('ID_Sede'); // Clave Foránea para la sede que hace la solicitud
            $table->text('Descripcion')->nullable(); // Descripción de la solicitud
            $table->enum('Estado', ['Pendiente', 'Aprobada', 'Rechazada'])->default('Pendiente'); // Estado de la solicitud
            $table->timestamps(); // created_at y updated_at

            // Definir las claves foráneas
            $table->foreign('ID_Sede')->references('ID_Sede')->on('sedes_caritas');
            $table->foreign('ID_Medicamento')->references('ID_Medicamento')->on('medicamentos')->nullable();
            $table->foreign('ID_EquipoMedico')->references('ID_Equipo')->on('equipos_medicos')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('solicitudes');
    }
};
