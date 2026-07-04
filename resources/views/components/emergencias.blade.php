<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atención de Emergencias Eléctricas - JEAB Company</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-950 text-gray-100 font-sans min-h-screen flex flex-col justify-between">

    @include('components.navbar')

    <div class="max-w-4xl mx-auto py-16 px-6 flex-1 flex flex-col justify-center w-full">
        <div class="bg-gray-900 border border-red-500/30 p-8 md:p-12 rounded-3xl shadow-2xl relative overflow-hidden">
            <div class="absolute -top-10 -right-10 w-40 h-40 bg-red-600/10 rounded-full blur-3xl pointer-events-none"></div>

            <div class="flex flex-col items-center text-center">
                <div class="bg-red-600 text-white p-5 rounded-2xl animate-pulse mb-6 shadow-lg shadow-red-600/30">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-10 h-10">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126ZM12 15.75h.007v.008H12v-.008Z" />
                    </svg>
                </div>

                <h1 class="text-3xl md:text-5xl font-extrabold text-red-500 tracking-tight">
                    Atención a Fallas Eléctricas Privadas
                </h1>
                <p class="text-base font-bold text-yellow-400 mt-2 tracking-wide uppercase">
                     Servicio de Emergencia de Alta Disponibilidad 
                </p>

                <p class="mt-6 text-gray-300 text-base md:text-lg leading-relaxed max-w-2xl font-light">
                    ¿Sufres de un cortocircuito, avería crítica, caídas de fase o fallas en sistemas de distribución industrial o residencial? Ponemos a tu disposición técnicos calificados de inmediato bajo normativas de seguridad estrictas.
                </p>

               

                <div class="mt-10 w-full flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="https://wa.me/50370000000?text=Hola,%20necesito%20atención%20urgente%20por%20una%20falla%20eléctrica%20en%20este%20momento." 
                       target="_blank"
                       class="bg-red-600 hover:bg-red-700 text-white font-bold px-8 py-4 rounded-xl text-base shadow-xl transition transform hover:scale-105 inline-flex items-center justify-center gap-2 shadow-red-600/20">
                         Solicitar Asistencia Inmediata via WhatsApp
                    </a>
                    
                    <a href="/" 
                       class="bg-gray-800 hover:bg-gray-700 text-gray-300 font-medium px-6 py-4 rounded-xl text-sm border border-gray-700 transition inline-flex items-center justify-center">
                        Regresar al Inicio
                    </a>
                </div>
            </div>
        </div>
    </div>

</body>
</html>