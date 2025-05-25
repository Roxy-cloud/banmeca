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
        Schema::create('jornada_paciente', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('jornada_id'); // Clave Foránea
            $table->unsignedBigInteger('paciente_id'); // Clave Foránea
            $table->unsignedBigInteger('medicamento_id'); // Clave Foránea
            $table->string('cantidad');
            $table->foreign('jornada_id')->references('id')->on('jornadas')->onDelete('cascade');
            $table->foreign('paciente_id')->references('id')->on('pacientes')->onDelete('cascade');
            $table->foreign('medicamento_id')->references('id')->on('medicamentos')->onDelete('cascade');
            $table->timestamps(); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jornada_paciente');
    }
};
