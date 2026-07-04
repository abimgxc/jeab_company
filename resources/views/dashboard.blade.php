@extends('layouts.app')

@section('content')
<div class="p-4 sm:p-8 max-w-7xl mx-auto w-full">
    
    <div class="mb-6 sm:mb-8">
        <h2 class="text-xl sm:text-2xl font-black text-white tracking-tight uppercase">
            ¡Bienvenido/a, {{ Auth::user()->name }}!
        </h2>
        <p class="text-xs text-gray-400 mt-1 font-light leading-relaxed">
            Consola unificada para la supervisión técnica de obras eléctricas, moderación de opiniones de usuarios y control de presupuestos.
        </p>
    </div>

    <div class="mb-4">
        <p class="text-[10px] font-semibold text-gray-500 uppercase tracking-wider mb-4">
            Accesos directos a los módulos
        </p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-6">
        
        <div class="bg-gray-900 border border-gray-800 p-5 rounded-2xl flex flex-col justify-between hover:border-gray-700 transition duration-200 shadow-xl">
            <div>
                <h3 class="font-bold text-white text-sm mb-1">Solicitudes de Cotización</h3>
                <p class="text-xs text-gray-400 font-light leading-relaxed mb-6">
                    Administración y almacenamiento de presupuestos técnicos ingresados por clientes.
                </p>
            </div>
            <a href="/cotizaciones" class="block text-center bg-yellow-400 hover:bg-yellow-500 text-gray-950 text-[11px] font-bold py-2.5 rounded-xl transition shadow-lg active:scale-95 uppercase tracking-wider">
                Abrir Cotizaciones
            </a>
        </div>

        <div class="bg-gray-900 border border-gray-800 p-5 rounded-2xl flex flex-col justify-between hover:border-gray-700 transition duration-200 shadow-xl">
            <div>
                <h3 class="font-bold text-white text-sm mb-1">Testimonios de Clientes</h3>
                <p class="text-xs text-gray-400 font-light leading-relaxed mb-6">
                    Panel de moderación interna de testimonios públicos y valoraciones.
                </p>
            </div>
            <a href="{{ route('testimonios.index') }}" class="block text-center bg-gray-950 hover:bg-gray-800 text-gray-400 hover:text-white border border-gray-800 hover:border-gray-700 text-[11px] font-bold py-2.5 rounded-xl transition active:scale-95 uppercase tracking-wider">
                Moderar Opiniones
            </a>
        </div>

        <div class="bg-gray-900 border border-gray-800 p-5 rounded-2xl flex flex-col justify-between hover:border-gray-700 transition duration-200 shadow-xl md:col-span-2 lg:col-span-1">
            <div>
                <h3 class="font-bold text-white text-sm mb-1">Control de Proyectos</h3>
                <p class="text-xs text-gray-400 font-light leading-relaxed mb-6">
                    Gestión integral de obras de ingeniería, localizaciones y especificaciones técnicas.
                </p>
            </div>
            <a href="{{ route('proyectos.index') }}" class="block text-center bg-gray-950 hover:bg-gray-800 text-gray-400 hover:text-white border border-gray-800 hover:border-gray-700 text-[11px] font-bold py-2.5 rounded-xl transition active:scale-95 uppercase tracking-wider">
                Ir al Portafolio
            </a>
        </div>

    </div>

</div>
@endsection