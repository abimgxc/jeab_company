<?php

namespace App\Http\Controllers;

abstract class Controller
{
    // Ejemplo de un método que podrías usar en todos tus controladores hijos
    protected function respuestaJson($data, $status = 200)
    {
        return response()->json($data, $status);
    }
}