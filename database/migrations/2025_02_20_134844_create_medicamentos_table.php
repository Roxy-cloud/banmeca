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
            $table->id();
            $table->unsignedBigInteger('categoria_id'); // Clave Foránea
            $table->unsignedBigInteger('insumo_id'); // Clave Foránea
            $table->unsignedBigInteger('benefactor_id'); // Clave Foránea
            $table->dateTime('Fecha_Donacion'); // Fecha de la Donación
            $table->string('Nombre');
            $table->string('Laboratorio');
            $table->string('Componente');
            $table->string('Existencia');
            $table->date('Fecha_Vencimiento');
            $table->string('imagen')->default('assets/img/storage/medicamento/medicina.png'); // Imagen por defecto
            $table->foreign('categoria_id')->references('id')->on('categorias')->onDelete('cascade');
            $table->foreign('insumo_id')->references('id')->on('insumos')->onDelete('cascade');
            $table->foreign('benefactor_id')->references('id')->on('benefactors')->onDelete('cascade');
            $table->timestamps();
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
