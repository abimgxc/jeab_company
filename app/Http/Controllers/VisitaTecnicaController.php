<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VisitaTecnica;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon; // <--- ESTA LÍNEA ES OBLIGATORIA

class VisitaTecnicaController extends Controller
{
    /**
     * Procesa la solicitud de una visita técnica.
     */
    public function store(Request $request)
    {
        // 1. Validación estricta
        $datos = $request->validate([
            'nombre'        => 'required|string|max:255',
            'correo'        => 'required|email|max:255',
            'telefono'      => 'required|string|max:20',
            'responsable'   => 'required|string|max:255',
            'ubicacion'     => 'required|string|max:500',
            'fecha'         => 'required|date|after_or_equal:today', 
            'hora'          => 'required',
            'tipo_inmueble' => 'required|string|max:100',
            'servicio'      => 'required|string|max:100',
            'descripcion'   => 'nullable|string|max:1000',
            'foto'          => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        // 2. Validación de Horario y Día
        $fechaSeleccionada = Carbon::parse($datos['fecha']);
        $horaSeleccionada = Carbon::parse($datos['hora']);
        
        $esSabado = $fechaSeleccionada->isSaturday();
        $esDiaLaboral = $fechaSeleccionada->isWeekday(); // Lunes a Viernes

        if ($esDiaLaboral) {
            // Lunes a Viernes: 07:00 a 16:00
            if ($horaSeleccionada->hour < 7 || $horaSeleccionada->hour >= 16) {
                return back()->withInput()->withErrors(['hora' => 'Para días laborales, el horario es de 7:00 AM a 4:00 PM.']);
            }
        } elseif ($esSabado) {
            // Sábados: 08:00 a 12:00
            if ($horaSeleccionada->hour < 8 || $horaSeleccionada->hour >= 12) {
                return back()->withInput()->withErrors(['hora' => 'Los sábados atendemos de 8:00 AM a 12:00 MD.']);
            }
        } else {
            // Domingo
            return back()->withInput()->withErrors(['fecha' => 'No realizamos visitas técnicas los días domingo.']);
        }

        // 3. Persistencia
        try {
            return DB::transaction(function () use ($request, &$datos) {
                if ($request->hasFile('foto')) {
                    $datos['foto'] = $request->file('foto')->store('visitas', 'public');
                }

                VisitaTecnica::create($datos);

                return redirect()->back()->with('success', 'Solicitud enviada correctamente.');
            });
        } catch (\Exception $e) {
            Log::error("Error en VisitaTecnica: " . $e->getMessage());
            return back()->withErrors(['error' => 'Ocurrió un error inesperado.']);
        }
    }
}