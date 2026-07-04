@extends('layouts.app')
@section('content')

    <div class="max-w-4xl mx-auto py-10 px-6">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl font-bold text-gray-900">Editar Proyecto</h1>
            <a href="{{ route('proyectos.index') }}" class="text-gray-500 hover:text-black font-medium text-sm">⬅️ Volver al panel</a>
        </div>

        <form id="proyecto-form" action="{{ route('proyectos.update', $proyecto->id) }}" method="POST" enctype="multipart/form-data" 
              class="bg-gray-950 p-8 rounded-3xl border border-gray-800 shadow-xl space-y-5">
            @csrf
            @method('PATCH')
            
            <input type="hidden" name="eliminar_galeria" id="eliminar-galeria-input" value="">

            @if ($errors->any())
                <div class="bg-red-900/20 border border-red-500 p-4 rounded-xl text-red-500 mb-6">
                    <ul class="list-disc pl-5 text-sm">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="grid md:grid-cols-2 gap-5">
                <div>
                    <label class="block text-gray-400 mb-1 text-sm">Nombre del Proyecto</label>
                    <input type="text" name="nombre" value="{{ old('nombre', $proyecto->nombre) }}" 
                           class="w-full bg-gray-900 border border-gray-700 rounded-xl p-4 text-white focus:border-yellow-400 focus:outline-none">
                </div>
                <div>
                    <label class="block text-gray-400 mb-1 text-sm">Ubicación</label>
                    <input type="text" name="ubicacion" value="{{ old('ubicacion', $proyecto->ubicacion) }}"
                           class="w-full bg-gray-900 border border-gray-700 rounded-xl p-4 text-white focus:border-yellow-400 focus:outline-none">
                </div>
            </div>

            <div class="grid md:grid-cols-2 gap-5">
                <div>
                    <label class="block text-gray-400 mb-1 text-sm">Fecha de Ejecución</label>
                    <input type="date" name="fecha_ejecucion" 
                           value="{{ old('fecha_ejecucion', $proyecto->getRawOriginal('fecha_ejecucion')) }}"
                           class="w-full bg-gray-900 border border-gray-700 rounded-xl p-4 text-white focus:border-yellow-400 focus:outline-none">
                </div>
            </div>

            <div>
                <label class="block text-gray-400 mb-1 text-sm">Descripción técnica</label>
                <textarea name="descripcion" rows="4"
                          class="w-full bg-gray-900 border border-gray-700 rounded-xl p-4 text-white focus:border-yellow-400 focus:outline-none">{{ old('descripcion', $proyecto->descripcion) }}</textarea>
            </div>

            <div class="pt-6 border-t border-gray-800 grid md:grid-cols-2 gap-8">
                
                <div class="space-y-4">
                    <label class="block text-gray-400 text-sm font-bold">Imagen/Video Principal Actual</label>
                    
                    <div class="bg-gray-900 rounded-2xl overflow-hidden border border-gray-800 h-48 flex items-center justify-center">
                        @if($proyecto->imagen)
                            @if(Str::endsWith($proyecto->imagen, ['.mp4', '.mov', '.avi', '.webm']))
                                <video src="{{ asset('storage/' . $proyecto->imagen) }}" class="h-full w-full object-cover" muted controls></video>
                            @else
                                <img src="{{ asset('storage/' . $proyecto->imagen) }}" class="h-full w-full object-cover">
                            @endif
                        @else
                            <p class="text-gray-600 text-xs italic">Sin portada asignada</p>
                        @endif
                    </div>

                    <div class="bg-gray-900 p-4 rounded-xl border border-gray-800">
                        <label class="text-[11px] text-yellow-400 font-bold uppercase block mb-2">Cambiar Portada</label>
                        <input type="file" name="imagen" class="text-white text-xs cursor-pointer" accept="image/*,video/*">
                    </div>
                </div>

                <div class="space-y-4">
                    <label class="block text-gray-400 text-sm font-bold">Galería Multimedia</label>
                    
                    <div id="dropzone" class="border-2 border-dashed border-gray-700 hover:border-yellow-400 rounded-xl p-4 text-center cursor-pointer bg-gray-900/50 transition">
                        <p class="text-[11px] text-gray-400">Arrastra aquí o <span class="text-yellow-400 font-semibold">haz clic</span> para añadir más fotos/videos</p>
                        <input type="file" id="galeria-input" class="hidden" multiple accept="image/*,video/*">
                    </div>

                    <div id="lista-archivos" class="space-y-2"></div>

                    @if($proyecto->imagenes && $proyecto->imagenes->count() > 0)
                        <div class="pt-2">
                            <label class="block text-gray-500 text-[11px] font-bold uppercase mb-2">Archivos guardados (Haz clic en la X para eliminar):</label>
                            <div class="grid grid-cols-3 gap-2">
                                @foreach($proyecto->imagenes as $archivo)
                                    <div id="media-card-{{ $archivo->id }}" class="relative bg-gray-900 rounded-lg overflow-hidden border border-gray-800 aspect-square flex items-center justify-center group">
                                        @if(Str::endsWith($archivo->ruta_foto, ['.mp4', '.mov', '.avi', '.webm']))
                                            <video src="{{ asset('storage/' . $archivo->ruta_foto) }}" class="w-full h-full object-cover" muted></video>
                                            <span class="absolute bottom-1 left-1 bg-black/70 text-[9px] text-white px-1 rounded">🎬 Video</span>
                                        @else
                                            <img src="{{ asset('storage/' . $archivo->ruta_foto) }}" class="w-full h-full object-cover">
                                        @endif

                                        <button type="button" data-id="{{ $archivo->id }}" class="eliminar-archivo-btn absolute top-1 right-1 bg-red-600/90 text-white font-bold rounded-full w-5 h-5 flex items-center justify-center text-xs opacity-100 md:opacity-0 md:group-hover:opacity-100 transition shadow">
                                            ×
                                        </button>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @else
                        <p class="text-gray-600 text-xs italic">La galería está vacía.</p>
                    @endif
                </div>

            </div>

            <button type="submit" class="w-full bg-yellow-400 py-4 rounded-xl font-bold text-black hover:bg-yellow-500 transition mt-6 shadow-lg">
                 Actualizar Proyecto
            </button>
        </form>
    </div>

    <script>
        const dropzone = document.getElementById('dropzone');
        const fileInput = document.getElementById('galeria-input');
        const listaArchivos = document.getElementById('lista-archivos');
        const form = document.getElementById('proyecto-form');
        const eliminarInput = document.getElementById('eliminar-galeria-input');
        
        let archivosAcumulados = [];
        let idsParaEliminar = [];

        // Captura el evento clic de los botones guardados de forma segura
        document.querySelectorAll('.eliminar-archivo-btn').forEach(boton => {
            boton.addEventListener('click', function() {
                const id = this.getAttribute('data-id');
                if(confirm('¿Quieres quitar esta imagen/video de la galería? Se borrará definitivamente al guardar.')) {
                    idsParaEliminar.push(parseInt(id));
                    eliminarInput.value = JSON.stringify(idsParaEliminar);
                    
                    const card = document.getElementById(`media-card-${id}`);
                    if(card) card.remove();
                }
            });
        });

        dropzone.addEventListener('click', () => fileInput.click());
        fileInput.addEventListener('change', (e) => { agregarArchivos(e.target.files); fileInput.value = ''; });

        ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(e => dropzone.addEventListener(e, (evt) => evt.preventDefault()));
        dropzone.addEventListener('drop', (e) => agregarArchivos(e.dataTransfer.files));

        function agregarArchivos(files) {
            Array.from(files).forEach(file => {
                archivosAcumulados.push(file);
                const item = document.createElement('div');
                item.className = "flex justify-between items-center bg-gray-900 p-2 rounded-lg border border-gray-800 text-[10px] text-gray-300";
                const icono = file.type.startsWith('video/') ? '🎬' : '📸';
                item.innerHTML = `<span>${icono} <b>${file.name}</b></span> <button type="button" class="text-red-400 hover:text-red-500 remove-btn font-bold">X</button>`;
                item.querySelector('.remove-btn').addEventListener('click', () => { archivosAcumulados = archivosAcumulados.filter(f => f !== file); item.remove(); });
                listaArchivos.appendChild(item);
            });
        }

        form.addEventListener('submit', (e) => {
            if (archivosAcumulados.length > 0) {
                const dataTransfer = new DataTransfer();
                archivosAcumulados.forEach(file => dataTransfer.items.add(file));
                fileInput.name = "galeria[]";
                fileInput.files = dataTransfer.files;
            }
        });
    </script>

@endsection