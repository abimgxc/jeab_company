<section id="testimonios" class="py-20 bg-gray-950 border-b border-gray-900 relative">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="text-center max-w-3xl mx-auto mb-12">
            <h2 class="text-3xl sm:text-5xl font-bold text-white tracking-tight">
                Lo que dicen nuestros <span class="text-yellow-400">Clientes</span>
            </h2>
            <p class="mt-4 text-gray-400 font-light text-sm sm:text-base">
                La confianza y satisfacción en cada proyecto de ingeniería eléctrica ejecutado son nuestro mayor respaldo.
            </p>
        </div>

        @if(session('success'))
            <div class="max-w-md mx-auto mb-8 bg-green-950/40 border border-green-500/30 text-green-400 p-4 rounded-xl text-center text-sm animate-pulse">
                {{ session('success') }}
            </div>
        @endif

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-12">
            @php
                $testimoniosActivos = \App\Models\Testimonio::where('activo', true)->latest()->take(3)->get();
            @endphp

            @forelse($testimoniosActivos as $t)
                <div class="bg-gray-900 border border-gray-800 p-6 rounded-2xl shadow-xl flex flex-col justify-between">
                    <div>
                        <div class="flex items-center space-x-1 text-yellow-400 mb-4">
                            @for($i = 1; $i <= 5; $i++)
                                <svg class="w-4 h-4 {{ $i <= $t->calificacion ? 'fill-current' : 'text-gray-700' }}" viewBox="0 0 20 20" fill="currentColor">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                </svg>
                            @endfor
                        </div>
                        <p class="text-gray-300 font-light italic text-sm leading-relaxed">
                            "{{ $t->comentario }}"
                        </p>
                    </div>
                    <div class="mt-6 border-t border-gray-800 pt-4">
                        <h4 class="text-sm font-bold text-white">{{ $t->nombre_cliente }}</h4>
                        <p class="text-xs text-gray-500 mt-0.5">
                            {{ $t->tipo_proyecto }} {{ $t->empresa ? 'en '.$t->empresa : '' }}
                        </p>
                    </div>
                </div>
            @empty
                <div class="col-span-1 md:col-span-3 text-center py-8 bg-gray-900/30 border border-dashed border-gray-800 rounded-2xl">
                    <p class="text-gray-500 text-sm">Sé el primero en dejar tu opinión sobre JEAB Company.</p>
                </div>
            @endforelse
        </div>

        <div class="text-center">
            <button onclick="document.getElementById('modal-testimonio').classList.remove('hidden')" 
                    class="bg-gray-900 hover:bg-gray-800 text-yellow-400 font-semibold px-6 py-3 rounded-xl text-sm border border-gray-800 transition tracking-wide shadow-lg">
                Dejar mi Testimonio
            </button>
        </div>

        <div id="modal-testimonio" class="hidden fixed inset-0 z-50 overflow-y-auto bg-black/70 backdrop-blur-sm flex items-center justify-center p-4">
            <div class="bg-gray-900 border border-gray-800 max-w-lg w-full rounded-2xl p-6 shadow-2xl relative">
                
                <div class="flex justify-between items-center border-b border-gray-800 pb-3 mb-4">
                    <h3 class="text-lg font-bold text-white">Cuéntanos tu experiencia</h3>
                    <button onclick="document.getElementById('modal-testimonio').classList.add('hidden')" class="text-gray-400 hover:text-white text-xl font-bold">&times;</button>
                </div>

                <form action="{{ route('testimonios.store.publico') }}" method="POST" class="space-y-4">
                    @csrf
                    <div>
                        <label class="block text-xs font-semibold text-gray-400 uppercase tracking-wider mb-1">Tu Nombre *</label>
                        <input type="text" name="nombre_cliente" required class="w-full bg-gray-950 border border-gray-800 rounded-xl px-4 py-2.5 text-sm text-white focus:outline-none focus:border-yellow-400 transition" placeholder="Ej: Emilio Izaguirre">
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-xs font-semibold text-gray-400 uppercase tracking-wider mb-1">Empresa (Opcional)</label>
                            <input type="text" name="empresa" class="w-full bg-gray-950 border border-gray-800 rounded-xl px-4 py-2.5 text-sm text-white focus:outline-none focus:border-yellow-400 transition" placeholder="Ej: JEAB Company">
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-gray-400 uppercase tracking-wider mb-1">Tipo de Proyecto *</label>
                            <input type="text" name="tipo_proyecto" required class="w-full bg-gray-950 border border-gray-800 rounded-xl px-4 py-2.5 text-sm text-white focus:outline-none focus:border-yellow-400 transition" placeholder="Ej: Instalación Eléctrica">
                        </div>
                    </div>

                    <div>
                        <label class="block text-xs font-semibold text-gray-400 uppercase tracking-wider mb-1">Calificación (Estrellas) *</label>
                        <select name="calificacion" required class="w-full bg-gray-950 border border-gray-800 rounded-xl px-4 py-2.5 text-sm text-white focus:outline-none focus:border-yellow-400 transition">
                            <option value="5">⭐⭐⭐⭐⭐ 5 - Excelente</option>
                            <option value="4">⭐⭐⭐⭐ 4 - Muy Bueno</option>
                            <option value="3">⭐⭐⭐ 3 - Bueno</option>
                            <option value="2">⭐⭐ 2 - Regular</option>
                            <option value="1">⭐ 1 - Malo</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-xs font-semibold text-gray-400 uppercase tracking-wider mb-1">Tu Comentario *</label>
                        <textarea name="comentario" rows="3" required class="w-full bg-gray-950 border border-gray-800 rounded-xl px-4 py-2.5 text-sm text-white focus:outline-none focus:border-yellow-400 transition resize-none" placeholder="Escribe aquí tu opinión sobre nuestro servicio técnico..."></textarea>
                    </div>

                    <div class="flex justify-end gap-3 pt-2">
                        <button type="button" onclick="document.getElementById('modal-testimonio').classList.add('hidden')" class="bg-gray-800 text-gray-300 px-4 py-2 rounded-xl text-sm font-medium hover:bg-gray-700 transition">Cancelar</button>
                        <button type="submit" class="bg-yellow-400 text-gray-950 px-5 py-2 rounded-xl text-sm font-bold hover:bg-yellow-500 transition">Enviar Testimonio</button>
                    </div>
                </form>

            </div>
        </div>

    </div>
</section>