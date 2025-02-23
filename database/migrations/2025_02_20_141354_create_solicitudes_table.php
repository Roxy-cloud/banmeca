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
            $table->id();
            $table->unsignedBigInteger('beneficiario_id'); // Clave Foránea
            $table->enum('Tipo_Solicitud', ['Comodato', 'Donativo']); // Tipo de solicitud
            $table->unsignedBigInteger('sedecaritas_id'); // Clave Foránea
            $table->text('Informe_Referencia'); // Informe o referencia médica
            $table->date('Fecha_Solicitud'); // Fecha de la solicitud
            $table->timestamps();
            $table->foreign('beneficiario_id')->references('id')->on('beneficiarios')->onDelete('cascade');
            $table->foreign('sedecaritas_id')->references('id')->on('sede_caritas_parroquial')->onDelete('cascade');
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
