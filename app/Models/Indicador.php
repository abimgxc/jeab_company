<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Indicador extends Model
{
    protected $table = 'indicadores'; // <--- ESTO ES VITAL
    protected $fillable = ['cifra', 'texto'];
}