<!DOCTYPE html>
<html lang="es" class="h-full bg-gray-950">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel Administrativo - JEAB Company</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .scrollbar-none::-webkit-scrollbar { display: none; }
        .scrollbar-none { -ms-overflow-style: none; scrollbar-width: none; }
    </style>
</head>
<body class="h-full bg-gray-950 text-gray-100 font-sans antialiased flex flex-col md:flex-row overflow-hidden">

    <div id="sidebar-backdrop" onclick="toggleSidebar()" class="fixed inset-0 bg-black/60 backdrop-blur-sm z-30 hidden md:hidden transition-opacity duration-300 opacity-0"></div>

    <aside id="sidebar" class="fixed inset-y-0 left-0 w-64 bg-gray-900 border-r border-gray-800 flex flex-col justify-between h-full shrink-0 z-40 shadow-2xl transform -translate-x-full transition-transform duration-300 md:translate-x-0 md:static">
        <div>
            <div class="p-6 border-b border-gray-800 flex items-center justify-between">
                <div>
                    <span class="text-xl font-black text-white tracking-wider">JEAB</span>
                    <span class="text-xl font-bold text-yellow-400 ml-0.5">Company</span>
                </div>
                <span class="bg-yellow-400/10 text-yellow-400 text-[10px] px-2 py-0.5 rounded font-mono border border-yellow-400/20">Panel</span>
            </div>

            <nav class="p-4 space-y-1 overflow-y-auto max-h-[calc(100vh-160px)] scrollbar-none">
                <p class="text-[10px] font-semibold text-gray-500 uppercase tracking-wider px-3 mb-2">Navegación</p>
                
                <a href="/dashboard" class="flex items-center gap-3 {{ Request::is('dashboard') ? 'bg-gray-800 text-yellow-400 border-gray-700 font-bold' : 'text-gray-400 hover:text-white hover:bg-gray-800/50 border-transparent' }} px-4 py-3 rounded-xl text-sm font-medium border transition">
                    Panel de Control
                </a>

                <a href="/" class="flex items-center gap-3 text-gray-400 hover:text-white hover:bg-gray-800/50 px-4 py-3 rounded-xl text-sm font-medium transition">
                    Ver Sitio Web
                </a>

                <a href="{{ route('proyectos.index') }}" class="flex items-center justify-between {{ Request::is('proyectos*') ? 'bg-gray-800 text-yellow-400 border-gray-700 font-bold' : 'text-gray-400 hover:text-white hover:bg-gray-800/50 border-transparent' }} px-4 py-3 rounded-xl text-sm font-medium border transition">
                    <span>Gestión de Proyectos</span>
                </a>

                <a href="{{ route('testimonios.index') }}" class="flex items-center justify-between {{ Request::is('testimonios*') ? 'bg-gray-800 text-yellow-400 border-gray-700 font-bold' : 'text-gray-400 hover:text-white hover:bg-gray-800/50 border-transparent' }} px-4 py-3 rounded-xl text-sm font-medium border transition">
                    <span>Moderar Opiniones</span>
                </a>

                <a href="/cotizaciones" class="flex items-center justify-between {{ Request::is('cotizaciones*') ? 'bg-gray-800 text-yellow-400 border-gray-700 font-bold' : 'text-gray-400 hover:text-white hover:bg-gray-800/50 border-transparent' }} px-4 py-3 rounded-xl text-sm font-medium border transition">
                    <span>Ver Cotizaciones</span>
                </a>
            </nav>
        </div>

        <div class="p-4 border-t border-gray-800 bg-gray-900/50 flex items-center gap-3">
            <div class="w-8 h-8 rounded-xl bg-yellow-400 text-gray-950 font-black flex items-center justify-center uppercase text-xs shadow-lg">
                {{ substr(auth()->user()->name, 0, 2) }}
            </div>
            <div class="min-w-0 flex-1">
                <p class="font-bold text-white text-xs truncate leading-tight">{{ auth()->user()->name }}</p>
                <p class="text-[10px] text-gray-500">Administrador</p>
            </div>
        </div>
    </aside>

    <div class="flex-1 flex flex-col h-full overflow-hidden bg-gray-950 w-full">
        
        <header class="h-16 border-b border-gray-900 bg-gray-900/40 backdrop-blur-md flex items-center justify-between px-4 sm:px-8 shrink-0">
            <div class="flex items-center gap-3">
                <button onclick="toggleSidebar()" class="p-2 -ml-2 text-gray-400 hover:text-white focus:outline-none md:hidden" aria-label="Abrir menú">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
                <h1 class="text-xs sm:text-sm font-bold text-white tracking-wider uppercase truncate">Consola de Control</h1>
            </div>
            
            <div class="text-[10px] sm:text-xs text-gray-400 flex items-center gap-2 bg-gray-900 px-2.5 py-1.5 rounded-xl border border-gray-800">
                <span class="w-1.5 h-1.5 rounded-full bg-green-500 animate-pulse"></span>
                <span>Conexión Segura</span>
            </div>
        </header>

        <main class="flex-1 p-0 overflow-y-auto w-full">
            @yield('content')
        </main>
    </div>

    <script>
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            const backdrop = document.getElementById('sidebar-backdrop');
            
            if (sidebar.classList.contains('-translate-x-full')) {
                sidebar.classList.remove('-translate-x-full');
                backdrop.classList.remove('hidden');
                setTimeout(() => backdrop.classList.add('opacity-100'), 20);
            } else {
                sidebar.classList.add('-translate-x-full');
                backdrop.classList.remove('opacity-100');
                setTimeout(() => backdrop.classList.add('hidden'), 300);
            }
        }
    </script>
</body>
</html>