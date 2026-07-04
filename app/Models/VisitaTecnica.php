<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class VisitaTecnica extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'correo',
        'telefono',
        'responsable',
        'ubicacion',
        'fecha',
        'hora',
        'tipo_inmueble',
        'servicio',
        'descripcion',
        'foto',
        'estado'
    ];

    /**
     * Definir valores por defecto para el estado de la visita.
     */
    protected $attributes = [
        'estado' => 'pendiente',
    ];

    /**
     * Casteo de datos para facilitar el manejo en el frontend.
     */
    protected $casts = [
        'fecha' => 'date',
        'hora'  => 'datetime:H:i',
    ];
}