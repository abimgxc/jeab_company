<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Servicio extends Model
{
    use HasFactory;

    /**
     * Definir la tabla explícitamente es una buena práctica
     * si el nombre no sigue la convención plural estándar.
     */
    protected $table = 'servicios';

    /**
     * Campos permitidos para asignación masiva.
     */
    protected $fillable = [
        'titulo',
        'descripcion',
        'icono'
    ];
}