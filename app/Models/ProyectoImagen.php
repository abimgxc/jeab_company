<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProyectoImagen extends Model
{
    protected $table = 'proyecto_imagens';
    
    protected $fillable = ['proyecto_id', 'ruta_foto'];

    public function proyecto()
    {
        return $this->belongsTo(Proyecto::class);
    }
    
    // Accesor para la URL de cada foto de la galería
    public function getUrlAttribute()
    {
        return asset('storage/' . $this->ruta_foto);
    }
}