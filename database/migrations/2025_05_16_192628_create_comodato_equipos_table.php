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
        Schema::create('comodato_equipos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('beneficiario_id'); // Clave Foránea
            $table->unsignedBigInteger('equipment_id'); // Clave Foránea
            $table->integer('cantidad'); // Cantidad prestada
            $table->dateTime('Fecha_Inicio'); // Fecha de inicio del comodato
            $table->dateTime('Fecha_Devolucion')->nullable(); // Fecha de devolución (puede ser NULL si aún no se devuelve)
            $table->foreign('beneficiario_id')->references('id')->on('beneficiarios')->onDelete('cascade');
            $table->foreign('equipment_id')->references('id')->on('equipments')->onDelete('cascade');
            $table->timestamps();
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comodato_equipments');
    }
};
