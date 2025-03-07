<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSolicitudesTable extends Migration
{
    public function up()
    {
        Schema::create('solicitudes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('beneficiario_id'); // Clave foránea
            $table->enum('tipo', ['comodato', 'donativo']);
            $table->enum('categoria', ['medicamentos', 'equipos médicos']);
            $table->text('descripcion')->nullable(); // Descripción opcional
            $table->timestamps();

            // Definir las claves foráneas
            $table->foreign('beneficiario_id')->references('id')->on('beneficiarios')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('solicitudes');
    }
}
