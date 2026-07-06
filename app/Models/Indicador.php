<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Indicador extends Model
{
    protected $table = 'indicadores'; // Nombre exacto de la tabla en tu base de datos
    protected $fillable = ['cifra', 'texto'];
}