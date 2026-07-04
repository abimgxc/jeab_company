<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente; // Usamos tu modelo Cliente existente
use App\Mail\NuevaCotizacionMail; 
use Illuminate\Support\Facades\Mail; 
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class CotizacionController extends Controller
{
    /**
     * Muestra el listado de cotizaciones en el panel administrativo.
     */
    public function index()
    {
        // Traemos los clientes registrados (cotizaciones) ordenados por los más recientes
        $cotizaciones = Cliente::orderBy('created_at', 'desc')->get();

        // Retornamos la vista pasándole los datos mapeados
        return view('cotizaciones.index', compact('cotizaciones'));
    }

    /**
     * Procesa la solicitud de cotización, guarda en BD y envía una notificación por correo.
     * Módulo 5: Solicitud de Cotizaciones.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'tipo_cliente' => 'required|in:particular,empresa',
            'nombre'       => 'required|string|max:255',
            'direccion'    => 'required|string|max:500',
            'telefono'     => 'required|string|max:20',
            'email'        => 'required|email|max:255',
            'nit'          => 'required_if:tipo_cliente,empresa|nullable|string',
            'giro'         => 'required_if:tipo_cliente,empresa|nullable|string',
            'dui'          => 'required_if:tipo_cliente,particular|nullable|string',
            'archivo_iva.*'=> 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        try {
            return DB::transaction(function () use ($request, $validatedData) {
                
                // 1. Guardar los datos del cliente en la Base de Datos
                $cliente = Cliente::create($validatedData);

                // Manejo de archivos (Imágenes de IVA si aplica)
                if ($request->hasFile('archivo_iva')) {
                    $rutas = [];
                    foreach ($request->file('archivo_iva') as $file) {
                        $path = $file->store('archivos_iva', 'public');
                        $rutas[] = $path;
                    }
                    $cliente->archivo_iva = json_encode($rutas);
                    $cliente->save();
                }

                // 2. ENVIAR EL CORREO ELECTRÓNICO AUTOMÁTICO (Requerimiento Módulo 5)
                Mail::to('administracion@jeabcompany.com')->send(new NuevaCotizacionMail($cliente));

                return response()->json([
                    'message' => 'Cotización recibida y correo enviado exitosamente.',
                    'cliente_id' => $cliente->id
                ], 201);
            });
        } catch (\Exception $e) {
            Log::error("Error al procesar cotización: " . $e->getMessage());
            
            return response()->json([
                'message' => 'Hubo un error al procesar su solicitud. Intente de nuevo.'
            ], 500);
        }
    }

    /**
     * Elimina una cotización/cliente específica del sistema.
     */
    public function destroy($id)
    {
        $cotizacion = Cliente::findOrFail($id);
        $cotizacion->delete();

        return redirect()->route('cotizaciones.index')
            ->with('success', 'La solicitud de cotización fue eliminada correctamente.');
    }
}