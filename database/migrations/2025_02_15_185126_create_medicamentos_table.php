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
        Schema::create('medicamentos', function (Blueprint $table) {
            $table->id('ID_Medicamento'); // Clave Primaria
            $table->unsignedBigInteger('ID_Categoria'); // Clave Foránea
            $table->string('Nombre'); // Nombre del medicamento
            $table->text('Descripcion')->nullable(); // Descripción del medicamento
            $table->date('Fecha_Vencimiento')->nullable(); // Fecha de Vencimiento
            $table->integer('Cantidad')->default(0); // Cantidad disponible
            $table->timestamps(); // created_at y updated_at

            // Definir la relación de clave foránea
            $table->foreign('ID_Categoria')->references('ID_Categoria')->on('categorias_medicamentos');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medicamentos');
    }
};

