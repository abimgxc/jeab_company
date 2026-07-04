<!-- ========================================================= -->
<!-- SECCIÓN SERVICIOS -->
<!-- id="servicios" permite navegar con href="#servicios" -->
<!-- bg-gray-950 = fondo casi negro -->
<!-- text-white = texto blanco -->
<!-- py-24 = padding arriba y abajo -->
<!-- border-b = línea inferior -->
<!-- scroll-mt = evita que el navbar tape el título -->
<!-- ========================================================= -->
<section
    id="servicios"
    class="bg-gray-950 text-white py-24 border-b border-gray-900 scroll-mt-32 md:scroll-mt-40"
>

    <!-- ===================================================== -->
    <!-- CONTENEDOR PRINCIPAL -->
    <!-- max-w-7xl = ancho máximo -->
    <!-- mx-auto = centra el contenido -->
    <!-- px = espacio lateral responsive -->
    <!-- ===================================================== -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <!-- ================================================= -->
        <!-- ENCABEZADO -->
        <!-- text-center = centra texto -->
        <!-- max-w-3xl = limita ancho -->
        <!-- mb-20 = margen inferior -->
        <!-- ================================================= -->
        <div class="text-center max-w-3xl mx-auto mb-20">

            <!-- Texto decorativo superior -->
            <span
                class="
                    text-xs
                    font-bold
                    tracking-widest
                    text-yellow-400
                    uppercase
                "
            >
                // Catálogo Oficial de Servicios
            </span>

            <!-- ============================================= -->
            <!-- TÍTULO PRINCIPAL -->
            <!-- text-3xl móvil -->
            <!-- text-4xl escritorio -->
            <!-- font-extrabold = muy gruesa -->
            <!-- mt-2 = separación arriba -->
            <!-- ============================================= -->
            <h3
                class="
                    text-3xl
                    sm:text-4xl
                    font-extrabold
                    mt-2
                    tracking-tight
                    text-white
                "
            >
                Soluciones Eléctricas de

                <!-- Texto amarillo resaltado -->
                <span class="text-yellow-400">
                    Alta Ingeniería
                </span>

            </h3>

        </div>

        <!-- ================================================= -->
        <!-- GRID DE SERVICIOS -->
        <!-- grid-cols-1 = 1 columna móvil -->
        <!-- md:grid-cols-2 = 2 columnas tablet -->
        <!-- lg:grid-cols-3 = 3 columnas PC -->
        <!-- gap-8 = espacio entre tarjetas -->
        <!-- ================================================= -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">

            <!-- ============================================= -->
            <!-- FOREACH -->
            <!-- Recorre todos los servicios enviados -->
            <!-- desde el controlador -->
            <!-- ============================================= -->
            @foreach ($servicios as $servicio)

                <!-- ========================================= -->
                <!-- TARJETA DE SERVICIO -->
                <!-- ========================================= -->
                <div

                    class="
                        bg-gray-900/50

                        /* Fondo semitransparente */
                        
                        rounded-2xl

                        /* Bordes redondeados */

                        overflow-hidden

                        /* Nada sobresale */

                        border border-gray-900

                        /* Borde oscuro */

                        flex flex-col

                        /* Contenido vertical */

                        justify-between

                        /* Distribuye espacios */

                        group

                        /* Permite efectos hover hijos */

                        hover:border-gray-800

                        /* Cambia borde al pasar mouse */

                        transition duration-300

                        /* Animación */

                        shadow-xl

                        /* Sombra elegante */

                        backdrop-blur-sm

                        /* Difuminado de fondo */
                    "
                >

                    <!-- ===================================== -->
                    <!-- CONTENEDOR IMAGEN -->
                    <!-- ===================================== -->
                    <div

                        class="
                            h-52

                            /* Altura fija */

                            overflow-hidden

                            /* Recorta excedentes */

                            relative

                            /* Necesario para overlay */

                            border-b border-gray-900

                            /* Línea inferior */
                        "

                    >

                        <!-- =============================== -->
                        <!-- IMAGEN DINÁMICA -->
                        <!-- =============================== -->
                        <img

                            src="{{ asset('img/' . $servicio->icono) }}"

                            alt="{{ $servicio->titulo }}"

                            class="
                                w-full

                                /* Ancho completo */

                                h-full

                                /* Alto completo */

                                object-cover

                                /* Rellena sin deformar */

                                group-hover:scale-105

                                /* Zoom al pasar mouse */

                                transition

                                duration-500
                            "

                            onerror="this.style.display='none'"

                        >

                        <!-- =============================== -->
                        <!-- OVERLAY OSCURO -->
                        <!-- Mejora contraste -->
                        <!-- =============================== -->
                        <div

                            class="
                                absolute

                                /* Flota sobre imagen */

                                inset-0

                                /* Ocupa todo */

                                bg-gradient-to-t

                                /* Degradado */

                                from-gray-900

                                /* Oscuro abajo */

                                via-transparent

                                /* Transparente centro */

                                to-transparent

                                /* Transparente arriba */

                                opacity-80
                            "

                        ></div>

                    </div>

                    <!-- ===================================== -->
                    <!-- INFORMACIÓN -->
                    <!-- ===================================== -->
                    <div class="p-6 space-y-3">

                        <!-- TÍTULO DEL SERVICIO -->
                        <h4

                            class="
                                text-lg

                                font-bold

                                text-white

                                tracking-tight

                                group-hover:text-yellow-400

                                transition duration-200
                            "

                        >

                            {{ $servicio->titulo }}

                        </h4>

                        <!-- DESCRIPCIÓN -->
                        <p

                            class="
                                text-gray-400

                                text-xs

                                leading-relaxed

                                text-justify
                            "

                        >

                            {{ $servicio->descripcion }}

                        </p>

                    </div>

                    <!-- ===================================== -->
                    <!-- BOTÓN WHATSAPP -->
                    <!-- ===================================== -->
                    <div class="p-6 pt-0">

                        <a

                            href="https://wa.me/50377410908?text=Hola%20JEAB%20Company,%20solicito%20información%20sobre:%20{{ urlencode($servicio->titulo) }}"

                            target="_blank"

                            class="
                                w-full
                                bg-gray-900
                                text-gray-200

                                hover:text-white
                                hover:border-yellow-400/50

                                border border-gray-800

                                py-3

                                rounded-xl

                                font-bold

                                text-xs

                                uppercase

                                tracking-wider

                                flex
                                items-center
                                justify-center

                                transition duration-300
                            "

                        >

                            <span>

                                ⚡ Solicitar Requerimiento

                            </span>

                        </a>

                    </div>

                </div>

            @endforeach

        </div>

    </div>

</section>