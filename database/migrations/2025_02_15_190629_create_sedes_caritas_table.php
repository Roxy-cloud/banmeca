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
        Schema::create('sedes_caritas', function (Blueprint $table) {
            $table->id('ID_Sede'); // Clave Primaria
            $table->string('Nombre_Sede'); // Nombre de la sede
            $table->string('Direccion'); // Dirección de la sede
            $table->string('Telefono')->nullable(); // Teléfono de la sede
            $table->string('Correo_Electronico')->nullable(); // Correo Electrónico de la sede
            $table->timestamps(); // created_at y updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sedes_caritas');
    }
};
