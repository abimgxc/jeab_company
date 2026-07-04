<nav class="bg-gray-950 border-b border-gray-800 sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-24">

            <!-- Logo -->
            <div class="flex items-center h-24">
                <a href="/" class="block h-full flex items-center">
                    <img src="{{ asset('img/logo-transparente.png') }}" alt="JEAB Company" class="h-20 w-auto object-contain">
                </a>
            </div>

            <!-- Menú Escritorio -->
            <div class="hidden md:flex items-center space-x-8">
                <a href="/" class="text-gray-300 hover:text-yellow-400 transition">Inicio</a>
                <a href="/#servicios" class="text-gray-300 hover:text-yellow-400 transition">Servicios</a>
<a href="{{ route('proyectos.create') }}"
   class="text-gray-300 hover:text-yellow-400 transition">
    Proyectos
</a>                <a href="{{ route('proyectos.publico') }}" 
                class="text-gray-300 hover:text-yellow-400">Portafolio</a>
                
                <!-- CORRECCIÓN AQUÍ -->
                <a href="{{ route('contacto') }}"
                   class="bg-yellow-400 hover:bg-yellow-500 text-gray-950 px-5 py-2.5 rounded-lg font-bold transition">
                   Contáctanos
                </a>
                
            </div>

            <!-- Botón Menú Móvil -->
            <button id="menu-btn" class="md:hidden text-white">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                </svg>
            </button>
        </div>

        <!-- Menú Móvil -->
        <div id="mobile-menu" class="hidden md:hidden pb-4">
            <a href="/" class="block py-3 text-gray-300 hover:text-yellow-400">Inicio</a>
            <a href="/#servicios" class="block py-3 text-gray-300 hover:text-yellow-400">Servicios</a>
<a href="{{ route('proyectos.create') }}"
   class="block py-3 text-gray-300 hover:text-yellow-400">
    Proyectos
</a>            <a href="{{ route('proyectos.publico') }}" class="block py-3 text-gray-300 hover:text-yellow-400">Portafolio</a>
            
            <!-- CORRECCIÓN AQUÍ -->
            <a href="{{ route('contacto') }}" class="block mt-3 text-center bg-yellow-400 text-gray-950 py-3 rounded-lg font-bold">
                Contáctanos
            </a>
        </div>
    </div>
</nav>
<script>
// Espera a que todo el HTML esté cargado
document.addEventListener('DOMContentLoaded', function () {

    const btn = document.getElementById('menu-btn'); // Selecciona el botón
    const menu = document.getElementById('mobile-menu'); // Selecciona el contenedor del menú móvil

    // Escucha el clic sobre el botón
    btn.addEventListener('click', function () {
        // Alterna la clase 'hidden': si existe la quita (muestra), si no existe la pone (oculta)
        menu.classList.toggle('hidden');
    });
});
</script>