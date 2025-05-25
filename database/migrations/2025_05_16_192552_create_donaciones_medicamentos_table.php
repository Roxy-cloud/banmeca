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
        Schema::create('donaciones_medicamentos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('beneficiario_id'); // Clave Foránea
            $table->unsignedBigInteger('medicamento_id'); // Clave Foránea
            $table->integer('cantidad'); // Cantidad donada
            $table->dateTime('Fecha_Donacion'); // Fecha de la donación
            $table->foreign('beneficiario_id')->references('id')->on('beneficiarios')->onDelete('cascade');
            $table->foreign('medicamento_id')->references('id')->on('medicamentos')->onDelete('cascade');
            $table->timestamps();
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('donaciones_medicamentos');
    }
};
