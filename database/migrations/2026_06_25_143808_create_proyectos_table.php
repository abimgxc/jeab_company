<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('proyectos', function (Blueprint $table) {

            $table->id();

            // Nombre del proyecto
            $table->string('nombre');

            // Ubicación
            $table->string('ubicacion');

            // Fecha de ejecución
            $table->date('fecha_ejecucion');

            // Descripción técnica
            $table->text('descripcion');

            // Estado del proyecto

            // Relación opcional con el modelo User (Módulo 6)
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('cascade');

            // Imagen principal
            $table->string('imagen')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('proyectos');
    }
};