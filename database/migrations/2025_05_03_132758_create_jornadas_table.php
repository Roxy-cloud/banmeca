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
        Schema::create('jornadas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('SedeRegional_id'); // Clave Foránea
            $table->unsignedBigInteger('SedeParroquial_id'); // Clave Foránea
            $table->string('diocesis'); // Diocesis
            $table->date('fecha'); // Fecha de la jornada
            $table->timestamps();
            $table->foreign('SedeRegional_id')->references('id')->on('sede_regional')->onDelete('cascade');
            $table->foreign('SedeParroquial_id')->references('id')->on('sede_parroquial')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jornadas');
    }
};
