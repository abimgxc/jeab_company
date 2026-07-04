<section id="nosotros" class="bg-gray-950 text-white py-24 border-b border-gray-900">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="text-center mb-16">
            <h2 class="text-4xl sm:text-5xl font-extrabold tracking-tight text-yellow-400 uppercase">Sobre Nosotros</h2>
            <p class="text-xs uppercase tracking-widest text-gray-400 mt-4 font-bold">
                BIENVENIDO A JEAB COMPANY, DONDE LA INGENIERÍA ELÉCTRICA IMPULSA SOLUCIONES SEGURAS Y CONFIABLES.
            </p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-start">
            
            <div class="space-y-8">
                <div class="bg-gray-900/40 p-8 rounded-2xl border border-gray-800 backdrop-blur-sm">
                    <div class="flex items-center space-x-3 mb-4">
                        <span class="text-yellow-400 text-2xl">⚡</span>
                        <h3 class="text-2xl font-bold text-white tracking-tight">Chispa de Origen</h3>
                    </div>
                    <p class="text-gray-400 leading-relaxed text-justify text-base">
                        El 31 de diciembre de 2021, Emilio Izaguirre, con apenas 19 años y gran pasión por la electricidad, decidió convertir su visión en realidad al fundar JEAB Company, convirtiéndose en su CEO. Su objetivo era crear una empresa que ofreciera un servicio eléctrico diferente, innovador y confiable. Lo que comenzó como una idea se transformó en una compañía comprometida con la seguridad, eficiencia y calidad en cada proyecto.
                    </p>
                </div>
            </div>

            <div class="space-y-8">
                <div class="bg-gray-900/40 p-8 rounded-2xl border-l-4 border-yellow-400 border border-gray-800 shadow-xl">
                    <h3 class="text-xl font-bold text-gray-200 uppercase tracking-wider mb-3 flex items-center">
                        <span class="text-yellow-400 mr-2">//</span> Nuestra Misión
                    </h3>
                    <p class="text-gray-400 leading-relaxed italic text-base">
                        "Brindar soluciones eléctricas integrales, seguras y eficientes mediante un equipo de técnicos e ingenieros comprometidos con la calidad e innovación."
                    </p>
                </div>

                <div class="bg-gray-900/40 p-8 rounded-2xl border-l-4 border-yellow-400 border border-gray-800 shadow-xl">
                    <h3 class="text-xl font-bold text-gray-200 uppercase tracking-wider mb-3 flex items-center">
                        <span class="text-yellow-400 mr-2">//</span> Nuestra Visión
                    </h3>
                    <p class="text-gray-400 leading-relaxed italic text-base">
                        "Ser reconocidos como la empresa líder en servicios eléctricos en El Salvador, destacando por nuestra calidad, seguridad y superación constante."
                    </p>
                </div>
            </div>
        </div>

        <div class="mt-24">
            <div class="text-center max-w-3xl mx-auto mb-16">
                <h3 class="text-2xl sm:text-3xl font-extrabold mt-2 text-white">
                    Valores que Dirigen nuestra <span class="text-yellow-400">Excelencia Técnica</span>
                </h3>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-6">
                @foreach(['Seguridad','Calidad','Innovación','Confianza','Ética','Eficiencia','Compromiso','Profesionalismo','Integridad','Adaptabilidad'] as $valor)
                <div class="bg-gray-900/40 p-5 rounded-xl border border-gray-800 transition hover:border-yellow-400">
                    <div class="text-yellow-400 text-lg font-bold mb-1">{{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}. {{ $valor }}</div>
                </div>
                @endforeach
            </div>
        </div>

        <div class="mt-20 pt-16 border-t border-gray-800">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div class="bg-gray-900/30 p-6 rounded-xl border border-gray-800"><span class="text-2xl">🏗️</span><h4 class="text-sm font-bold mt-2 mb-1">Construcción</h4><p class="text-xs text-gray-400">Líneas de media y baja tensión.</p></div>
                <div class="bg-gray-900/30 p-6 rounded-xl border border-gray-800"><span class="text-2xl">⚡</span><h4 class="text-sm font-bold mt-2 mb-1">Potencia</h4><p class="text-xs text-gray-400">Subestaciones y mantenimiento.</p></div>
                <div class="bg-gray-900/30 p-6 rounded-xl border border-gray-800"><span class="text-2xl">🔧</span><h4 class="text-sm font-bold mt-2 mb-1">Multiservicios</h4><p class="text-xs text-gray-400">Atención integral personalizada.</p></div>
                <div class="bg-gray-900/30 p-6 rounded-xl border border-gray-800"><span class="text-2xl">📍</span><h4 class="text-sm font-bold mt-2 mb-1">Ubicación</h4><p class="text-xs text-gray-400">Santa Ana, El Salvador.</p></div>
            </div>
        </div>
    </div>
</section>