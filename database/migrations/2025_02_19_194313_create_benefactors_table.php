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
        Schema::create('benefactors', function (Blueprint $table) {
            $table->id();
            $table->string('Nombre'); // Nombre del benefactor
            $table->enum('Tipo', ['Persona Natural', 'Institución']); // Tipo de benefactor
            $table->string('RIF_Cedula')->unique(); // Identificación del benefactor
            $table->string('Direccion')->nullable(); // Dirección
            $table->string('Telefono')->nullable(); // Teléfono
            $table->string('email')->nullable(); // Correo Electrónico
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('benefactors');
    }
};
