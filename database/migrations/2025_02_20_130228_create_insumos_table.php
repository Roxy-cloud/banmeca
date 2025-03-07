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
        Schema::create('insumos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('benefactor_id'); // Clave Foránea
            $table->enum('Tipo_Insumo', ['Medicamento', 'Equipo Médico']);
            $table->dateTime('Fecha_Insumo'); // Fecha de la Donación
            $table->foreign('benefactor_id')->references('id')->on('benefactors')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('insumos');
    }
};
