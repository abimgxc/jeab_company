<x-guest-layout>

<nav class="bg-gray-950 border-b border-gray-800 sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-24">

            <div class="flex items-center h-24">
                <a href="/" class="block h-full flex items-center">
                    <img src="{{ asset('img/logo-transparente.png') }}" alt="JEAB Company" class="h-20 w-auto object-contain">
                </a>
            </div>

            <div class="hidden md:flex items-center space-x-8">
                <a href="/#inicio" class="text-gray-300 hover:text-yellow-400 transition">Inicio</a>
                <a href="/#servicios" class="text-gray-300 hover:text-yellow-400 transition">Servicios</a>
                <a href="/#proyectos" class="text-gray-300 hover:text-yellow-400 transition">Proyectos</a>
                
                <a href="{{ route('proyectos.publico') }}" class="text-yellow-400 font-bold tracking-wide">Portafolio</a>
                
                <a href="/#contacto" class="bg-yellow-400 hover:bg-yellow-500 text-gray-950 px-5 py-2.5 rounded-lg font-bold transition">
                    Contáctanos
                </a>
            </div>

            <button id="menu-btn" class="md:hidden text-white">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                </svg>
            </button>
        </div>

        <div id="mobile-menu" class="hidden md:hidden pb-4">
            <a href="/#inicio" class="block py-3 text-gray-300 hover:text-yellow-400">Inicio</a>
            <a href="/#servicios" class="block py-3 text-gray-300 hover:text-yellow-400">Servicios</a>
            <a href="/#proyectos" class="block py-3 text-gray-300 hover:text-yellow-400">Proyectos</a>
            <a href="{{ route('proyectos.publico') }}" class="block py-3 text-yellow-400 font-bold">Portafolio</a>
            
            <a href="/#contacto" class="block mt-3 text-center bg-yellow-400 text-gray-950 py-3 rounded-lg font-bold">
                Contáctanos
            </a>
        </div>
    </div>
</nav>

<section class="pt-6 pb-20 bg-gray-950 min-h-screen">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="mt-2 mb-10 text-center">
            <span class="text-[11px] md:text-xs font-mono font-bold tracking-[0.2em] text-yellow-400 uppercase block mb-2">
                // PORTAFOLIO OFICIAL DE PROYECTOS
            </span>
            <h2 class="text-3xl md:text-5xl font-black text-white tracking-tight uppercase">
                Nuestros Proyectos <span class="text-yellow-400">Realizados</span>
            </h2>
            <p class="text-xs md:text-sm text-gray-400 mt-3 font-light max-w-2xl mx-auto leading-relaxed normal-case">
                Explora el historial, soluciones técnicas y montajes de ingeniería eléctrica ejecutados con los más altos estándares de calidad.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-10 items-stretch">
            @forelse($proyectos as $proyecto)
            
            <div onclick="verDetalles(this)"
                 data-proyecto="{{ json_encode($proyecto->load('imagenes')) }}"
                 class="group flex flex-col rounded-3xl overflow-hidden border border-gray-800 bg-[#0b0f19] hover:border-yellow-400 transition-all duration-300 cursor-pointer h-full">

                <div class="relative w-full h-64 bg-black overflow-hidden flex items-center justify-center shrink-0">
                    @if(Str::endsWith($proyecto->imagen, ['.mp4', '.mov', '.webm']))
                        <video autoplay muted loop playsinline class="w-full h-full object-cover">
                            <source src="{{ asset('storage/'.$proyecto->imagen) }}">
                        </video>
                        <div class="absolute top-3 right-3 bg-black/70 text-white rounded-full w-10 h-10 flex items-center justify-center shadow-lg">
                            ▶
                        </div>
                    @else
                        <img src="{{ asset('storage/'.$proyecto->imagen) }}"
                             alt="{{ $proyecto->nombre }}"
                             class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                    @endif
                </div>

                <div class="flex flex-col flex-1 p-6 relative bg-[#0b0f19] z-10">
                    <span class="text-gray-400 text-xs mb-3 flex items-center gap-1">
                         {{ $proyecto->fecha_formateada }}
                    </span>

                    <h3 class="text-2xl font-bold text-white mb-3 leading-tight group-hover:text-yellow-400 transition-colors">
                        {{ $proyecto->nombre }}
                    </h3>

                    <p class="text-gray-400 text-sm mb-6 line-clamp-3">
                        {{ $proyecto->descripcion }}
                    </p>

                    <div class="mt-auto flex justify-between items-center pt-4 border-t border-gray-800/50">
                        <span class="bg-yellow-400 text-black px-4 py-1.5 rounded-full text-xs font-bold shadow-md">
                            {{ $proyecto->ubicacion }}
                        </span>

                        <span class="text-yellow-400 font-bold text-sm flex items-center gap-1 group-hover:translate-x-1 transition-transform">
                            Ver proyecto &rarr;
                        </span>
                    </div>
                </div>

            </div>
            
            @empty
            <div class="col-span-full text-center py-12 bg-gray-900 rounded-3xl border border-gray-800">
                <p class="text-gray-400 text-lg">No se encontraron proyectos realizados en este momento.</p>
            </div>
            @endforelse
        </div>
    </div>
</section>

<div id="modalProyecto" class="fixed inset-0 bg-black/95 z-50 hidden flex-col items-center justify-center p-4 backdrop-blur-md">
    <div class="bg-[#0b0f19] border border-gray-800 max-w-4xl w-full rounded-3xl overflow-hidden shadow-2xl relative flex flex-col max-h-[90vh]">
        
        <button onclick="cerrarModal()" class="absolute top-4 right-4 bg-gray-900/80 text-white hover:bg-yellow-400 hover:text-black w-10 h-10 rounded-full flex items-center justify-center font-bold z-20 transition shadow-lg">
            ✕
        </button>

        <div class="relative h-72 md:h-[55vh] w-full bg-black flex items-center justify-center overflow-hidden">
            <div id="carruselContenedor" class="flex w-full h-full transition-transform duration-500 ease-in-out"></div>

            <button id="btnPrev" onclick="cambiarFoto(-1)" class="absolute left-4 bg-gray-900/80 text-white hover:bg-yellow-400 hover:text-black p-3 rounded-full transition hidden z-10 shadow-lg">←</button>
            <button id="btnNext" onclick="cambiarFoto(1)" class="absolute right-4 bg-gray-900/80 text-white hover:bg-yellow-400 hover:text-black p-3 rounded-full transition hidden z-10 shadow-lg">→</button>
        </div>

        <div class="p-6 overflow-y-auto border-t border-gray-900 bg-[#0b0f19]">
            <h3 id="modalTitulo" class="text-2xl font-bold text-white mb-2"></h3>
            <div class="flex gap-4 text-xs font-semibold mb-4">
                <span id="modalFecha" class="text-yellow-400 flex items-center gap-1"></span>
                <span id="modalUbicacion" class="text-gray-400 flex items-center gap-1"></span>
            </div>
            <p id="modalDescripcion" class="text-gray-300 text-sm leading-relaxed whitespace-pre-line"></p>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const btn = document.getElementById('menu-btn');
        const menu = document.getElementById('mobile-menu');
        if (btn && menu) {
            btn.addEventListener('click', function () {
                menu.classList.toggle('hidden');
            });
        }
    });

    let fotosActuales = [];
    let indiceActual = 0;

    function verDetalles(elementoCard) {
        const proyecto = JSON.parse(elementoCard.getAttribute('data-proyecto'));
        abrirModal(proyecto);
    }

    function esVideo(ruta) {
        return ['.mp4', '.webm', '.mov', '.avi'].some(ext => ruta.toLowerCase().endsWith(ext));
    }

    function abrirModal(proyecto) {
        document.getElementById('modalTitulo').innerText = proyecto.nombre;
        document.getElementById('modalDescripcion').innerText = proyecto.descripcion;
        document.getElementById('modalUbicacion').innerText = '' + proyecto.ubicacion;
        document.getElementById('modalFecha').innerText = '' + (proyecto.fecha_formateada || proyecto.fecha_ejecucion);

        fotosActuales = [`/storage/${proyecto.imagen}`];
        if(proyecto.imagenes && proyecto.imagenes.length > 0) {
            proyecto.imagenes.forEach(img => fotosActuales.push(`/storage/${img.ruta_foto}`));
        }

        const contenedor = document.getElementById('carruselContenedor');
        contenedor.innerHTML = '';
        indiceActual = 0;
        contenedor.style.transform = `translateX(0%)`;

        fotosActuales.forEach(src => {
            const wrapper = document.createElement('div');
            wrapper.className = "min-w-full h-full flex items-center justify-center bg-black relative overflow-hidden";

            if (esVideo(src)) {
                const video = document.createElement('video');
                video.src = src;
                video.controls = true;
                video.className = "max-w-full max-h-full object-contain"; 
                wrapper.appendChild(video);
            } else {
                const img = document.createElement('img');
                img.src = src;
                img.className = "max-w-full max-h-full object-contain cursor-zoom-in transition-transform duration-200 origin-center select-none"; 
                
                img.addEventListener('click', function() {
                    this.classList.toggle('scale-[2.5]');
                    this.classList.toggle('cursor-zoom-out');
                    this.classList.toggle('cursor-zoom-in');
                    if (!this.classList.contains('scale-[2.5]')) this.style.transform = 'none';
                });

                img.addEventListener('mousemove', function(e) {
                    if (this.classList.contains('scale-[2.5]')) {
                        const rect = wrapper.getBoundingClientRect();
                        const x = ((e.clientX - rect.left) / rect.width) * 100;
                        const y = ((e.clientY - rect.top) / rect.height) * 100;
                        this.style.transformOrigin = `${x}% ${y}%`;
                    }
                });

                img.addEventListener('mouseleave', function() {
                    this.classList.remove('scale-[2.5]', 'cursor-zoom-out');
                    this.classList.add('cursor-zoom-in');
                    this.style.transform = 'none';
                    this.style.transformOrigin = 'center';
                });

                wrapper.appendChild(img);
            }
            contenedor.appendChild(wrapper);
        });

        document.getElementById('btnPrev').classList.toggle('hidden', fotosActuales.length <= 1);
        document.getElementById('btnNext').classList.toggle('hidden', fotosActuales.length <= 1);
        
        document.getElementById('modalProyecto').classList.remove('hidden');
        document.getElementById('modalProyecto').classList.add('flex');
    }

    function cerrarModal() {
        document.querySelectorAll('#carruselContenedor video').forEach(v => v.pause());
        document.getElementById('modalProyecto').classList.add('hidden');
        document.getElementById('modalProyecto').classList.remove('flex');
    }

    function cambiarFoto(dir) {
        document.querySelectorAll('#carruselContenedor video').forEach(v => v.pause());
        document.querySelectorAll('#carruselContenedor img').forEach(img => {
            img.classList.remove('scale-[2.5]', 'cursor-zoom-out');
            img.classList.add('cursor-zoom-in');
            img.style.transform = 'none';
        });

        indiceActual = (indiceActual + dir + fotosActuales.length) % fotosActuales.length;
        document.getElementById('carruselContenedor').style.transform = `translateX(-${indiceActual * 100}%)`;
    }

    window.onclick = function(e) {
        if (e.target == document.getElementById('modalProyecto')) cerrarModal();
    }
</script>

</x-guest-layout>