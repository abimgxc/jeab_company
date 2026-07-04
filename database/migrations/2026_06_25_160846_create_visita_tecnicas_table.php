<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('visitas_tecnicas', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('correo');
            $table->string('telefono');
            $table->string('responsable');
            $table->text('ubicacion');
            $table->date('fecha');
            $table->time('hora'); // Cambiado a 'time'
            $table->string('tipo_inmueble');
            $table->string('servicio');
            $table->text('descripcion')->nullable();
            $table->string('foto')->nullable();
            
            // Usando enum para integridad de datos
            $table->enum('estado', ['Pendiente', 'Confirmada', 'Realizada', 'Cancelada'])
                  ->default('Pendiente');
            
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('visita_tecnicas');
    }
};