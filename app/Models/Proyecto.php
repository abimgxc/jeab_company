<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Carbon\Carbon;

class Proyecto extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'cliente',
        'ubicacion',
        'fecha_ejecucion',
        'descripcion',
        'estado',
        'imagen'
    ];

    // Asegura que JavaScript en el modal lea la fecha limpia procesada
    protected $appends = ['fecha_formateada'];

    public function imagenes()
    {
        return $this->hasMany(ProyectoImagen::class, 'proyecto_id');
    }

    /**
     * Accesor para mostrar la fecha de forma elegante sin romper el backend
     */
    public function getFechaFormateadaAttribute()
    {
        if (empty($this->attributes['fecha_ejecucion'])) {
            return '';
        }
        return ucfirst(Carbon::parse($this->attributes['fecha_ejecucion'])->locale('es')->isoFormat('MMMM YYYY'));
    }

    /**
     * Accesor opcional para la URL de la imagen principal
     */
    public function getImagenUrlAttribute()
    {
        return $this->imagen ? asset('storage/' . $this->imagen) : asset('images/default-project.png');
    }
}