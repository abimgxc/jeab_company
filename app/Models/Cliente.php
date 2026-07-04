<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cliente extends Model
{
    use HasFactory;

    /**
     * Los atributos que son asignables masivamente.
     */
    protected $fillable = [
        'tipo_cliente', 
        'nombre', 
        'direccion', 
        'telefono', 
        'email', 
        'dui', 
        'nit', 
        'giro', 
        'archivo_iva'
    ];

    /**
     * El modelo 'casts' permite convertir tipos de datos automáticamente.
     * Como guardamos un JSON de rutas en 'archivo_iva', 
     * Laravel lo convertirá en un array automáticamente al consultarlo.
     */
    protected $casts = [
        'archivo_iva' => 'array',
    ];
}