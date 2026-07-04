<?php

use App\Models\Servicio;
use App\Models\Indicador;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProyectoController;
use App\Http\Controllers\CotizacionController;
use App\Http\Controllers\VisitaTecnicaController;
use App\Http\Controllers\TestimoniosController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// =========================================================================
// 1. SITIO WEB CORPORATIVO & PORTAFOLIO (Rutas Públicas)
// =========================================================================

Route::get('/', function () {
    // TRUCO TEMPORAL PARA FORZAR MIGRACIONES EN RENDER FREE
    try {
        \Illuminate\Support\Facades\Artisan::call('migrate', ['--force' => true]);
    } catch(\Exception $e) {}

    // Inyección dinámica de datos en la Landing Page Principal
    $servicios = Servicio::all();
    $indicadores = Indicador::all();
    return view('inicio', compact('servicios', 'indicadores'));
})->name('inicio');

// Ruta de contacto estática optimizada para caché
Route::view('/contacto', 'components.contacto')->name('contacto');

// Vista pública del portafolio con soporte para filtros de búsqueda
Route::get('/nuestros-proyectos', [ProyectoController::class, 'publicIndex'])->name('proyectos.publico');

// Vista individual de atención a fallas críticas (Emergencias)
Route::view('/emergencias', 'components.emergencias')->name('emergencias');


// =========================================================================
// RECEPCIÓN PÚBLICA DE FORMULARIOS (Clientes ingresando datos)
// =========================================================================
Route::post('/cotizacion', [CotizacionController::class, 'store'])->name('cotizacion.store');
Route::post('/visitas', [VisitaTecnicaController::class, 'store'])->name('visitas.store');

// Para que el público envíe testimonios desde la web
Route::post('/testimonios/publico', [TestimoniosController::class, 'store'])->name('testimonios.store.publico');


// =========================================================================
// 2. PANEL ADMINISTRATIVO PROTEGIDO (Sólo Administradores Autenticados)
// =========================================================================
Route::middleware(['auth', 'verified'])->group(function () {
    
    // Dashboard Central de Administración
    Route::view('/dashboard', 'dashboard')->name('dashboard');

    // Gestión de Proyectos
    Route::resource('proyectos', ProyectoController::class)->except(['show']);

    // Gestión de Testimonios Internos y botón de Aprobar
    Route::patch('testimonios/{id}/aprobar', [TestimoniosController::class, 'aprobar'])->name('testimonios.aprobar');
    Route::resource('testimonios', TestimoniosController::class)->except(['show']);
    
    // Gestión de Cotizaciones en el Panel (Solo ver el listado y poder eliminarlas)
    Route::resource('cotizaciones', CotizacionController::class)->only(['index', 'destroy']);

    // Rutas de Perfil de Usuario (Seguridad Breeze)
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
