<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Proyecto;
use App\Models\ProyectoImagen;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ProyectoController extends Controller
{
    /**
     * Vista del Panel Administrativo: Lista todos los proyectos.
     */
    public function index()
    {
        $proyectos = Proyecto::latest()->get();
        return view('proyectos.index', compact('proyectos'));
    }

    /**
     * Muestra el formulario de creación.
     */
    public function create()
    {
        return view('proyectos.create');
    }

    /**
     * Almacena un nuevo proyecto y su galería de fotos/videos de forma acumulativa.
     */
    public function store(Request $request)
    {
        // Validamos los textos normales y los archivos multimedia masivos (512MB máx)
        $datos = $request->validate([
            'nombre'          => 'required|string|max:255',
            'ubicacion'       => 'required|string|max:255',
            'fecha_ejecucion' => 'required|date',
            'descripcion'     => 'required|string|min:10',
            'imagen'          => 'nullable|file|mimes:jpeg,png,jpg,webp,mp4,mov,avi,webm|max:524288', 
            'galeria'         => 'nullable|array',
            'galeria.*'       => 'file|mimes:jpeg,png,jpg,webp,mp4,mov,avi,webm|max:524288',
        ]);

        try {
            return DB::transaction(function () use ($request, $datos) {
                // 1. Guardar archivo principal (Portada) si existe
                if ($request->hasFile('imagen')) {
                    $datos['imagen'] = $request->file('imagen')->store('proyectos', 'public');
                }

                // 2. Crear el proyecto en la base de datos
                $proyecto = Proyecto::create($datos);

                // 3. Guardar la galería multimedia acumulada (Múltiples archivos)
                if ($request->hasFile('galeria')) {
                    foreach ($request->file('galeria') as $multimedia) {
                        $ruta = $multimedia->store('proyectos/galerias', 'public');
                        
                        // Guardamos la relación en tu tabla secundaria
                        ProyectoImagen::create([
                            'proyecto_id' => $proyecto->id,
                            'ruta_foto'   => $ruta
                        ]);
                    }
                }

                return redirect()->route('proyectos.index')->with('success', 'Proyecto y galería registrados exitosamente.');
            });
        } catch (\Exception $e) {
            Log::error("Error al crear proyecto: " . $e->getMessage());
            return back()->withInput()->withErrors(['error' => 'Ocurrió un error al guardar el proyecto.']);
        }
    }

    /**
     * Muestra el formulario de edición para el administrador.
     */
    public function edit(Proyecto $proyecto)
    {
        // Cargamos el proyecto con sus imágenes asociadas
        $proyecto->load('imagenes');
        return view('proyectos.edit', compact('proyecto'));
    }

    /**
     * Actualiza la información del proyecto.
     */
    public function update(Request $request, Proyecto $proyecto)
    {
        $datos = $request->validate([
            'nombre'          => 'required|string|max:255',
            'ubicacion'       => 'required|string|max:255',
            'fecha_ejecucion' => 'required|date',
            'descripcion'     => 'required|string|min:10',
            'imagen'          => 'nullable|file|mimes:jpeg,png,jpg,webp,mp4,mov,avi,webm|max:524288', 
            'galeria'         => 'nullable|array',
            'galeria.*'       => 'file|mimes:jpeg,png,jpg,webp,mp4,mov,avi,webm|max:524288'
        ]);

        try {
            return DB::transaction(function () use ($request, $proyecto, $datos) {
                
                // 🛠️ NUEVO: Procesar los elementos eliminados desde la vista (si existen)
                if ($request->filled('eliminar_galeria')) {
                    $ids = json_decode($request->eliminar_galeria, true);
                    if (is_array($ids)) {
                        $imagenesABorrar = ProyectoImagen::whereIn('id', $ids)
                                                         ->where('proyecto_id', $proyecto->id)
                                                         ->get();
                        foreach ($imagenesABorrar as $img) {
                            // Borrar el archivo físico del storage
                            Storage::disk('public')->delete($img->ruta_foto);
                            // Eliminar el registro en la BD
                            $img->delete();
                        }
                    }
                }

                // Si sube una nueva imagen/video principal, borramos la anterior del almacenamiento
                if ($request->hasFile('imagen')) {
                    if ($proyecto->imagen) {
                        Storage::disk('public')->delete($proyecto->imagen);
                    }
                    $datos['imagen'] = $request->file('imagen')->store('proyectos', 'public');
                }

                // Actualizar los datos básicos del proyecto
                $proyecto->update($datos);

                // Si añade más fotos/videos a la galería
                if ($request->hasFile('galeria')) {
                    foreach ($request->file('galeria') as $foto) {
                        $ruta = $foto->store('proyectos/galerias', 'public');
                        ProyectoImagen::create([
                            'proyecto_id' => $proyecto->id,
                            'ruta_foto'   => $ruta
                        ]);
                    }
                }

                return redirect()->route('proyectos.index')->with('success', 'Proyecto actualizado con éxito.');
            });
        } catch (\Exception $e) {
            Log::error("Error al actualizar proyecto: " . $e->getMessage());
            return back()->withInput()->withErrors(['error' => 'Error al actualizar el proyecto.']);
        }
    }

    /**
     * Elimina el proyecto, sus registros en BD y todos sus archivos físicos.
     */
    public function destroy(Proyecto $proyecto)
    {
        try {
            return DB::transaction(function () use ($proyecto) {
                // 1. Borrar imagen principal física
                if ($proyecto->imagen) {
                    Storage::disk('public')->delete($proyecto->imagen);
                }

                // 2. Borrar las fotos físicas de su galería
                foreach ($proyecto->imagenes as $foto) {
                    Storage::disk('public')->delete($foto->ruta_foto);
                }

                // 3. Eliminar de la base de datos
                $proyecto->delete();

                return redirect()->route('proyectos.index')->with('success', 'Proyecto y todos sus archivos eliminados.');
            });
        } catch (\Exception $e) {
            Log::error("Error al eliminar proyecto: " . $e->getMessage());
            return redirect()->route('proyectos.index')->with('error', 'No se pudo eliminar el proyecto.');
        }
    }

    /**
     * Vista pública del portafolio (Módulo 2 Frontend).
     */
    public function publicIndex(Request $request)
    {
        $query = Proyecto::with('imagenes')->latest();

        // Aplicamos los filtros de búsqueda según el texto enviado
        if ($request->filled('buscar')) {
            $query->where('nombre', 'like', '%' . $request->buscar . '%')
                  ->orWhere('descripcion', 'like', '%' . $request->buscar . '%')
                  ->orWhere('ubicacion', 'like', '%' . $request->buscar . '%');
        }

        $proyectos = $query->get();

        return view('proyectos.publico', compact('proyectos'));
    }
}