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
       Schema::create('donacion_equipos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('beneficiario_id'); // Clave Foránea
            $table->unsignedBigInteger('equipment_id'); // Clave Foránea
            $table->integer('cantidad'); // Cantidad donada
            $table->dateTime('Fecha_Donacion'); // Fecha de la donación
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
        Schema::dropIfExists('donaciones_equipments');
    }
};
