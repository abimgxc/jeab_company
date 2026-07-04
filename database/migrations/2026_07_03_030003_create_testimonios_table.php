<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('testimonios', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_cliente'); // [cite: 35]
            $table->string('empresa')->nullable(); // Opcional [cite: 36]
            $table->string('tipo_proyecto'); // [cite: 37]
            $table->text('comentario'); // [cite: 38]
            $table->unsignedTinyInteger('calificacion'); // Del 1 al 5 [cite: 39]
            $table->boolean('aprobado')->default(false); // Para moderar si se muestra o no
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('testimonios');
    }
};