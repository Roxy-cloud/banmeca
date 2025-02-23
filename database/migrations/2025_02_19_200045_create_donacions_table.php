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
        Schema::create('donacions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('benefactor_id'); // Clave Foránea
            $table->dateTime('Fecha_Donacion'); // Fecha de la Donación
            $table->text('Descripcion')->nullable(); // Descripción de la Donación
            $table->timestamps();
            // Definir la relación de clave foránea con la tabla benefactors
            $table->foreign('benefactor_id')->references('id')->on('benefactors')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('donacions');
    }
};
