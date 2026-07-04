<!DOCTYPE html>
<html lang="es" class="h-full bg-gray-950">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Proyecto - JEAB Company</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="h-full bg-gray-950 text-gray-100 font-sans antialiased flex overflow-hidden">

    <aside class="w-64 bg-gray-900 border-r border-gray-800 flex flex-col justify-between h-full shrink-0 z-20 shadow-2xl">
        <div>
            <div class="p-6 border-b border-gray-800 flex items-center justify-between">
                <div>
                    <span class="text-xl font-black text-white tracking-wider">JEAB</span>
                    <span class="text-xl font-bold text-yellow-400 ml-0.5">Company</span>
                </div>
                <span class="bg-yellow-400/10 text-yellow-400 text-[10px] px-2 py-0.5 rounded font-mono border border-yellow-400/20">Panel</span>
            </div>

            <nav class="p-4 space-y-1">
                <p class="text-[10px] font-semibold text-gray-500 uppercase tracking-wider px-3 mb-2">Navegación</p>
                
                <a href="/dashboard" class="flex items-center gap-3 text-gray-400 hover:text-white hover:bg-gray-800/50 px-4 py-3 rounded-xl text-sm font-medium transition">
                    <span class="text-base"></span> Panel de Control
                </a>

                <a href="/" class="flex items-center gap-3 text-gray-400 hover:text-white hover:bg-gray-800/50 px-4 py-3 rounded-xl text-sm font-medium transition">
                    <span class="text-base"></span> Ver Sitio Web
                </a>

                <a href="{{ route('proyectos.index') }}" class="flex items-center justify-between bg-gray-800 text-yellow-400 px-4 py-3 rounded-xl text-sm font-medium border border-gray-700 transition">
                    <span class="flex items-center gap-3"><span></span> Gestión de Proyectos</span>
                </a>

                <a href="{{ route('testimonios.index') }}" class="flex items-center justify-between text-gray-400 hover:text-white hover:bg-gray-800/50 px-4 py-3 rounded-xl text-sm font-medium transition">
                    <span class="flex items-center gap-3"><span></span> Moderar Opiniones</span>
                </a>

                <a href="/cotizaciones" class="flex items-center justify-between text-gray-400 hover:text-white hover:bg-gray-800/50 px-4 py-3 rounded-xl text-sm font-medium transition">
                    <span class="flex items-center gap-3"><span></span> Ver Cotizaciones</span>
                </a>
            </nav>
        </div>

        <div class="p-4 border-t border-gray-800 bg-gray-900/50 flex items-center gap-3">
            <div class="w-8 h-8 rounded-xl bg-yellow-400 text-gray-950 font-black flex items-center justify-center uppercase text-xs">
                {{ substr(auth()->user()->name, 0, 2) }}
            </div>
            <div class="min-w-0 flex-1">
                <p class="font-bold text-white text-xs truncate leading-tight">{{ auth()->user()->name }}</p>
                <p class="text-[10px] text-gray-500">Administrador</p>
            </div>
        </div>
    </aside>

    <div class="flex-1 flex flex-col h-full overflow-hidden bg-gray-950">
        
        <header class="h-16 border-b border-gray-900 bg-gray-900/40 backdrop-blur-md flex items-center justify-between px-8 shrink-0">
            <div class="flex items-center gap-2 text-sm">
                <a href="{{ route('proyectos.index') }}" class="text-gray-500 hover:text-yellow-400 transition">Gestión de Proyectos</a>
                <span class="text-gray-700">/</span>
                <span class="text-gray-200 font-medium">Registrar Nuevo</span>
            </div>
            
            <a href="{{ route('proyectos.index') }}" class="bg-gray-900 hover:bg-gray-800 text-gray-400 hover:text-white border border-gray-800 px-4 py-2 rounded-xl text-xs font-semibold transition">
                ← Volver al Listado
            </a>
        </header>

        <main class="flex-1 p-8 overflow-y-auto">
            <div class="max-w-4xl mx-auto space-y-6">
                
                <div>
                    <h2 class="text-2xl font-extrabold text-white tracking-tight">Registrar Proyecto Técnico</h2>
                    <p class="text-xs text-gray-400 mt-1">Ingresa las especificaciones del nuevo registro para actualizar el Módulo 2 del sistema.</p>
                </div>

                <form action="{{ route('proyectos.store') }}" method="POST" enctype="multipart/form-data" 
                      class="bg-gray-900 p-8 rounded-3xl border border-gray-800 shadow-2xl space-y-6">
                    @csrf
                    
                    @if ($errors->any())
                        <div class="bg-red-950/40 border border-red-900/50 p-4 rounded-xl text-red-400 text-sm">
                            <p class="font-bold mb-1">Por favor corrige los siguientes errores:</p>
                            <ul class="list-disc pl-5 space-y-0.5 text-xs">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="grid md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-gray-400 mb-1.5 text-xs font-bold uppercase tracking-wider">Nombre del Proyecto</label>
                            <input type="text" name="nombre" value="{{ old('nombre') }}" placeholder="Ej: Instalación Eléctrica Residencial" 
                                   class="w-full bg-gray-950 border border-gray-800 rounded-xl p-4 text-white placeholder-gray-600 text-sm focus:outline-none focus:border-yellow-400 focus:ring-1 focus:ring-yellow-400 transition">
                        </div>

                        <div>
                            <label class="block text-gray-400 mb-1.5 text-xs font-bold uppercase tracking-wider">Ubicación de la Obra</label>
                            <input type="text" name="ubicacion" value="{{ old('ubicacion') }}" placeholder="Ej: Santa Ana Centro" 
                                   class="w-full bg-gray-950 border border-gray-800 rounded-xl p-4 text-white placeholder-gray-600 text-sm focus:outline-none focus:border-yellow-400 focus:ring-1 focus:ring-yellow-400 transition">
                        </div>
                    </div> 

                    <div class="grid md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-gray-400 mb-1.5 text-xs font-bold uppercase tracking-wider">Fecha de Ejecución</label>
                            <input type="date" name="fecha_ejecucion" value="{{ old('fecha_ejecucion') }}"
                                   class="w-full bg-gray-950 border border-gray-800 rounded-xl p-4 text-white text-sm focus:outline-none focus:border-yellow-400 focus:ring-1 focus:ring-yellow-400 transition color-scheme-dark" style="color-scheme: dark;">
                        </div>
                    </div>

                    <div>
                        <label class="block text-gray-400 mb-1.5 text-xs font-bold uppercase tracking-wider">Descripción Técnica</label>
                        <textarea name="descripcion" placeholder="Detalles de ingeniería, materiales, transformadores y alcances del proyecto..." rows="4"
                                  class="w-full bg-gray-950 border border-gray-800 rounded-xl p-4 text-white placeholder-gray-600 text-sm focus:outline-none focus:border-yellow-400 focus:ring-1 focus:ring-yellow-400 transition">{{ old('descripcion') }}</textarea>
                    </div>

                    <div class="pt-6 border-t border-gray-800/60 grid md:grid-cols-2 gap-6">
                        <div class="bg-gray-950 p-5 rounded-2xl border border-gray-800/80">
                            <label class="block text-white mb-1 text-xs font-bold uppercase tracking-wider">Imagen de Portada Principal</label>
                            <p class="text-[11px] text-gray-500 mb-3">Se muestra en la cuadrícula de proyectos ejecutados.</p>
                            <input type="file" name="imagen" class="text-gray-400 text-xs file:mr-4 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-semibold file:bg-gray-900 file:text-yellow-400 hover:file:bg-gray-800 file:cursor-pointer cursor-pointer" accept="image/*,video/*">
                        </div>

                        <div class="bg-gray-950 p-5 rounded-2xl border border-gray-800/80">
                            <label class="block text-white mb-1 text-xs font-bold uppercase tracking-wider">Galería Interna (Opcional)</label>
                            <p class="text-[11px] text-gray-500 mb-3">Puedes adjuntar múltiples fotos complementarias.</p>
                            <input type="file" name="galeria[]" class="text-gray-400 text-xs file:mr-4 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-semibold file:bg-gray-900 file:text-yellow-400 hover:file:bg-gray-800 file:cursor-pointer cursor-pointer" multiple accept="image/*,video/*">
                        </div>
                    </div>

                    <div class="pt-4">
                        <button type="submit" class="w-full bg-yellow-400 hover:bg-yellow-500 text-gray-950 font-black py-4 rounded-xl text-xs uppercase tracking-widest transition shadow-lg shadow-yellow-400/5">
                             Guardar Proyecto en Base de Datos
                        </button>
                    </div>
                </form>

            </div>
        </main>
    </div>

</body>
</html>