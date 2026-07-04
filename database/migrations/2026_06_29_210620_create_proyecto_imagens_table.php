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
    Schema::create('proyecto_imagens', function (Blueprint $table) {
        $table->id();
        // Relación con la tabla proyectos. Si se elimina el proyecto, se borran sus fotos (onDelete cascade)
        $table->foreignId('proyecto_id')->constrained()->onDelete('cascade');
        $table->string('ruta_foto');
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('proyecto_imagens');
    }
};
