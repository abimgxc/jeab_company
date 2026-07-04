@extends('layouts.app')

@section('content')
<div class="p-4 sm:p-8 max-w-7xl mx-auto w-full space-y-6">
    
    <div class="pb-4 border-b border-gray-900/60">
        <h2 class="text-xl sm:text-2xl font-black text-white tracking-tight uppercase">Solicitudes de Cotización</h2>
        <p class="text-xs text-gray-400 mt-1 font-light leading-relaxed">
            Bandeja de entrada y administración de presupuestos técnicos ingresados por clientes potenciales.
        </p>
    </div>

    <div class="bg-gray-900 border border-gray-800 rounded-2xl shadow-xl overflow-hidden">
        
        <div class="hidden md:block overflow-x-auto">
            <table class="w-full text-left border-collapse text-sm">
                <thead>
                    <tr class="border-b border-gray-800 bg-gray-950/50 text-gray-400 text-[11px] font-semibold uppercase tracking-wider">
                        <th class="py-4 px-6">Cliente / Contacto</th>
                        <th class="py-4 px-6">Tipo / Documento</th>
                        <th class="py-4 px-6">Dirección</th>
                        <th class="py-4 px-6">Fecha</th>
                        <th class="py-4 px-6 text-right">Acciones</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-800/60 font-light text-gray-300">
                    @forelse($cotizaciones as $cotizacion)
                    <tr class="hover:bg-gray-800/20 transition group">
                        <td class="py-4 px-6">
                            <div class="font-bold text-white group-hover:text-yellow-400 transition">{{ $cotizacion->nombre }}</div>
                            <div class="text-xs text-gray-500 mt-0.5">{{ $cotizacion->email }} • {{ $cotizacion->telefono }}</div>
                        </td>
                        <td class="py-4 px-6 whitespace-nowrap">
                            <span class="px-2 py-0.5 rounded text-[10px] uppercase font-mono font-bold {{ $cotizacion->tipo_cliente === 'empresa' ? 'bg-blue-500/10 text-blue-400 border border-blue-500/20' : 'bg-purple-500/10 text-purple-400 border border-purple-500/20' }}">
                                {{ $cotizacion->tipo_cliente }}
                            </span>
                            <div class="text-xs text-gray-400 mt-1">
                                @if($cotizacion->tipo_cliente === 'empresa')
                                    NIT: {{ $cotizacion->nit ?? 'N/A' }}
                                @else
                                    DUI: {{ $cotizacion->dui ?? 'N/A' }}
                                @endif
                            </div>
                        </td>
                        <td class="py-4 px-6 max-w-xs">
                            <p class="text-xs text-gray-400 line-clamp-2 leading-relaxed">{{ $cotizacion->direccion }}</p>
                        </td>
                        <td class="py-4 px-6 text-xs text-gray-500 whitespace-nowrap">
                            {{ $cotizacion->created_at ? $cotizacion->created_at->format('d/m/Y H:i') : 'N/A' }}
                        </td>
                        <td class="py-4 px-6 text-right whitespace-nowrap">
                            <div class="flex items-center justify-end gap-3">
                                <a href="mailto:{{ $cotizacion->email }}" class="text-xs font-bold text-yellow-400 hover:text-yellow-500 transition uppercase tracking-wider">
                                    Responder
                                </a>
                                <form action="/cotizaciones/{{ $cotizacion->id }}" method="POST" onsubmit="return confirm('¿Eliminar de forma permanente esta solicitud?');" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-xs font-bold text-red-400 hover:text-red-500 transition uppercase tracking-wider">
                                        Eliminar
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="py-12 text-center text-gray-500 text-xs uppercase tracking-widest font-mono">
                            No hay solicitudes de cotización pendientes
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="block md:hidden divide-y divide-gray-800/80">
            @forelse($cotizaciones as $cotizacion)
            <div class="p-4 space-y-3 hover:bg-gray-800/10 transition">
                <div class="flex justify-between items-start gap-2">
                    <div>
                        <h3 class="text-sm font-bold text-white">{{ $cotizacion->nombre }}</h3>
                        <p class="text-[11px] text-gray-500 mt-0.5">{{ $cotizacion->email }}</p>
                    </div>
                    <span class="text-[10px] font-mono text-gray-500 shrink-0">
                        {{ $cotizacion->created_at ? $cotizacion->created_at->format('d/m/Y') : '' }}
                    </span>
                </div>

                <div class="bg-gray-950/40 border border-gray-800/60 rounded-xl p-3 text-xs space-y-1">
                    <div class="text-gray-400 font-light"><strong class="text-gray-300 font-semibold">Dirección:</strong> {{ $cotizacion->direccion }}</div>
                    <div class="text-[11px] text-gray-500 uppercase font-mono">
                        {{ $cotizacion->tipo_cliente }} • 
                        {{ $cotizacion->tipo_cliente === 'empresa' ? 'NIT: '.$cotizacion->nit : 'DUI: '.$cotizacion->dui }}
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-2 pt-1">
                    <a href="mailto:{{ $cotizacion->email }}" class="bg-gray-950 text-yellow-400 font-bold py-2 rounded-xl text-center text-xs border border-gray-800 transition active:scale-95 uppercase tracking-wider">
                        Contactar
                    </a>
                    <form action="/cotizaciones/{{ $cotizacion->id }}" method="POST" onsubmit="return confirm('¿Eliminar esta cotización?');" class="w-full">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="w-full bg-red-950/30 text-red-400 font-bold py-2 rounded-xl text-center text-xs border border-red-900/20 transition active:scale-95 uppercase tracking-wider">
                            Eliminar
                        </button>
                    </form>
                </div>
            </div>
            @empty
            <div class="py-12 text-center text-gray-500 text-xs uppercase tracking-widest font-mono">
                No hay solicitudes pendientes
            </div>
            @endforelse
        </div>

    </div>
</div>
@endsection