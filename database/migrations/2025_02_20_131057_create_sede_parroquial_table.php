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
        Schema::create('sede_parroquial', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('SedeRegional_id'); // Clave Foránea
            $table->unsignedBigInteger('user_id')->nullable(); // Clave Foránea
            $table->string('Nombre');
            $table->string('Direccion');
            $table->string('telefono');
            $table->timestamps();
             // Definir la relación de clave foránea con la tabla sederegionals
             $table->foreign('SedeRegional_id')->references('id')->on('sede_regional')->onDelete('cascade');
             $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sede_caritas_parroquial');
    }
};
