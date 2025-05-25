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
        Schema::create('medicamento_componente', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('componente_id'); // Clave Foránea
            $table->unsignedBigInteger('medicamento_id'); // Clave Foránea
            $table->timestamps();
            $table->foreign('componente_id')->references('id')->on('componentes')->onDelete('cascade');
            $table->foreign('medicamento_id')->references('id')->on('medicamentos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medicamento_componente');
    }
};
