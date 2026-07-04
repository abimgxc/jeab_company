@extends('layouts.app')

@section('content')
<div class="p-4 sm:p-8 max-w-7xl mx-auto w-full space-y-6">
    
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 pb-4 border-b border-gray-900/60">
        <div>
            <h2 class="text-xl sm:text-2xl font-black text-white tracking-tight uppercase">Mis Proyectos</h2>
            <p class="text-xs text-gray-400 mt-1 font-light leading-relaxed">
                Historial y especificaciones técnicas de las obras registradas en el sistema.
            </p>
        </div>
        
        <a href="/proyectos/create" class="inline-block text-center bg-yellow-400 hover:bg-yellow-500 text-gray-950 font-bold px-4 py-2.5 rounded-xl text-xs uppercase tracking-wider transition shadow-lg shadow-yellow-400/5 active:scale-95 shrink-0">
            + Nuevo Proyecto
        </a>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-6">
        
        @foreach($proyectos as $proyecto)
        <div class="bg-gray-900 border border-gray-800 rounded-2xl overflow-hidden shadow-xl flex flex-col justify-between hover:border-gray-700 transition group">
            
            <div class="relative h-48 bg-gray-950 overflow-hidden shrink-0 border-b border-gray-800/50">
                @if($proyecto->imagen)
                    @if(Str::endsWith($proyecto->imagen, ['.mp4', '.mov', '.webm']))
                        <video autoplay muted loop playsinline class="w-full h-full object-cover">
                            <source src="{{ asset('storage/'.$proyecto->imagen) }}" type="video/mp4">
                        </video>
                        <div class="absolute top-3 right-3 bg-black/70 text-white rounded-full w-8 h-8 flex items-center justify-center text-[10px]">
                            ▶
                        </div>
                    @else
                        <img src="{{ asset('storage/'.$proyecto->imagen) }}" alt="{{ $proyecto->nombre }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                    @endif
                @else
                    <div class="w-full h-full flex items-center justify-center text-gray-700 bg-gray-950">
                        <span class="text-2xl">📁</span>
                    </div>
                @endif
            </div>

            <div class="p-5 flex-1 flex flex-col justify-between space-y-4">
                <div>
                    <h3 class="text-sm font-bold text-white group-hover:text-yellow-400 transition line-clamp-2">
                        {{ $proyecto->nombre }}
                    </h3>
                    <p class="text-xs text-gray-400 mt-2 font-light line-clamp-3 leading-relaxed">
                        {{ $proyecto->descripcion }}
                    </p>
                </div>

                <div class="space-y-1.5 pt-2 border-t border-gray-800/60 text-[11px]">
                    <div class="flex items-center gap-2 text-yellow-500/90 font-medium">
                        <span class="shrink-0">📍</span>
                        <span class="truncate uppercase tracking-wider">{{ $proyecto->ubicacion }}</span>
                    </div>
                    <div class="flex items-center gap-2 text-gray-500">
                        <span class="shrink-0">📅</span>
                        <span>{{ $proyecto->fecha_ejecucion }}</span>
                    </div>
                </div>
            </div>

            <div class="p-5 pt-0 grid grid-cols-2 gap-3">
                <a href="/proyectos/{{ $proyecto->id }}/edit" class="bg-gray-950 hover:bg-gray-800 text-center text-yellow-400 font-bold py-2.5 rounded-xl text-xs transition border border-gray-800 hover:border-gray-700 active:scale-95">
                    Editar
                </a>
                
                <form action="/proyectos/{{ $proyecto->id }}" method="POST" onsubmit="return confirm('¿Seguro que deseas eliminar este proyecto?');" class="w-full">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="w-full bg-red-950/40 hover:bg-red-900/60 text-center text-red-400 font-bold py-2.5 rounded-xl text-xs transition border border-red-900/30 active:scale-95">
                        Eliminar
                    </button>
                </form>
            </div>

        </div>
        @endforeach

    </div>
</div>
@endsection