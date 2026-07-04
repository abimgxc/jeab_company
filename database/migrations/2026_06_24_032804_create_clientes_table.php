<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->id();
            
            // Tipo de cliente usando enum estándar
            $table->enum('tipo_cliente', ['particular', 'empresa']); 
            
            $table->string('nombre'); 
            $table->string('direccion');
            $table->string('telefono');
            $table->string('email');

            // Campos específicos
            $table->string('dui')->nullable(); 
            $table->string('nit')->nullable(); 
            $table->string('giro')->nullable();
            
            // Cambiamos string a text para almacenar rutas JSON múltiples
            $table->text('archivo_iva')->nullable(); 
            
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('clientes');
    }
};