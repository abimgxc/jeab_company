@extends('layouts.app')

@section('content')
<div class="p-4 sm:p-8 max-w-7xl mx-auto w-full">
    
    <div class="mb-6 sm:mb-8">
        <h2 class="text-xl sm:text-2xl font-black text-white tracking-tight uppercase">Panel de Moderación de Opiniones</h2>
        <p class="text-xs text-gray-400 mt-1 font-light leading-relaxed">
            Administra, aprueba o elimina los testimonios enviados por los usuarios en la plataforma pública.
        </p>
    </div>
    

    <div class="bg-gray-900 border border-gray-800 rounded-2xl shadow-xl p-4 sm:p-6">
        @if($testimonios->isEmpty())
            <div class="text-center py-12">
                <span class="text-4xl block mb-3">💬</span>
                <p class="text-sm text-gray-400">No se han registrado testimonios en el sistema.</p>
            </div>
        @else
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 sm:gap-6">
                @foreach($testimonios as $testimonio)
                    <div class="bg-gray-950 border border-gray-800 p-4 sm:p-5 rounded-xl flex flex-col justify-between hover:border-gray-700 transition duration-200">
                        <div>
                            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-2 mb-3 pb-3 border-b border-gray-900/50">
                                <h4 class="font-bold text-white text-sm truncate max-w-[200px]">{{ $testimonio->nombre }}</h4>
                                
                                <div class="flex items-center gap-2 flex-wrap">
                                    @if(isset($testimonio->aprobado) && $testimonio->aprobado)
                                        <span class="bg-green-500/10 text-green-400 text-[9px] px-2 py-0.5 rounded-md border border-green-500/20 font-medium whitespace-nowrap">Visible en Web</span>
                                    @else
                                        <span class="bg-yellow-500/10 text-yellow-400 text-[9px] px-2 py-0.5 rounded-md border border-yellow-500/20 font-medium whitespace-nowrap">Pendiente</span>
                                    @endif
                                    
                                    <span class="text-xs text-yellow-400 tracking-wider whitespace-nowrap">
                                        {{ str_repeat('★', $testimonio->calificacion) }}{{ str_repeat('☆', 5 - $testimonio->calificacion) }}
                                    </span>
                                </div>
                            </div>
                            
                            <p class="text-xs text-gray-400 italic font-light leading-relaxed break-words">
                                "{{ $testimonio->comentario }}"
                            </p>
                        </div>
                        
                        <div class="flex items-center justify-end gap-2 mt-5 pt-3 border-t border-gray-900">
                            
                            @if(!isset($testimonio->aprobado) || !$testimonio->aprobado)
                                <form action="{{ route('testimonios.aprobar', $testimonio->id) }}" method="POST" class="shrink-0">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="bg-yellow-400 hover:bg-yellow-500 text-gray-950 text-[11px] font-bold px-3.5 py-1.5 rounded-lg transition shadow-lg active:scale-95">
                                        Aprobar
                                    </button>
                                </form>
                            @endif

                            <form action="{{ route('testimonios.destroy', $testimonio->id) }}" method="POST" class="shrink-0" onsubmit="return confirm('¿Estás seguro de que deseas eliminar este testimonio permanentemente?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500/10 hover:bg-red-500 text-red-500 hover:text-white text-[11px] font-bold px-3 py-1.5 rounded-lg transition border border-red-500/20 active:scale-95">
                                    Eliminar
                                </button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</div>
@endsection