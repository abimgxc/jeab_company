<?php

namespace App\Http\Controllers;

use App\Models\Testimonio;
use Illuminate\Http\Request;

class TestimoniosController extends Controller
{
    // 1. Ver todos los testimonios en el panel de administración
    public function index()
    {
        $testimonios = Testimonio::latest()->get();
        return view('testimonios.index', compact('testimonios')); // Ruta corregida sin 'admin.'
    }

    // 2. El público registra un testimonio desde la web (entra como pendiente)
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'comentario' => 'required|string',
            'calificacion' => 'required|integer|min:1|max:5',
        ]);

        Testimonio::create([
            'nombre' => $request->nombre,
            'comentario' => $request->comentario,
            'calificacion' => $request->calificacion,
            'aprobado' => false, // Queda en espera de la revisión del admin
        ]);

        return redirect()->back()->with('success', '¡Gracias! Tu opinión será revisada por el administrador.');
    }

    // 3. El administrador aprueba el testimonio para que sea público
    public function activar($id)
    {
        $testimonio = Testimonio::findOrFail($id);
        $testimonio->update(['aprobado' => true]);

        return redirect()->back()->with('success', 'Testimonio aprobado con éxito.');
    }

    // 4. El administrador elimina el testimonio
    public function destroy($id)
    {
        $testimonio = Testimonio::findOrFail($id);
        $testimonio->delete();

        return redirect()->back()->with('success', 'Testimonio eliminado correctamente.');
    }
}