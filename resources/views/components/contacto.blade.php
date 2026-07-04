<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Contacto - JEAB Company</title>
</head>
<body class="bg-gray-950 text-white min-h-screen flex items-center justify-center p-4">

    <div class="max-w-md w-full bg-gray-900 p-8 rounded-3xl border border-gray-800 text-center shadow-2xl">
        <!-- Logo -->
        <img src="{{ asset('img/logo-transparente.png') }}" class="h-20 mx-auto mb-6">
        
        <h1 class="text-3xl font-bold text-yellow-400 mb-2">¡Hablemos!</h1>
        <p class="text-gray-400 mb-8">Elige tu canal preferido para contactarnos:</p>

        <!-- Canales de contacto -->
        <div class="space-y-4">
            <!-- WhatsApp -->
            <a href="https://wa.me/message/IWIPPIGNESMWF1" target="_blank" 
               class="block w-full bg-green-600 hover:bg-green-500 text-white p-4 rounded-xl font-bold transition flex items-center justify-center gap-2">
               WhatsApp
            </a>

            <!-- Instagram -->
            <a href="https://www.instagram.com/jeabcompany21_?igsh=d3VnNmN1OWpmYWU1&utm_source=qr" target="_blank" 
               class="block w-full bg-pink-600 hover:bg-pink-700 text-white p-4 rounded-xl font-medium transition border border-gray-700">
               Instagram
            </a>

            <!-- TikTok -->
            <a href="https://www.tiktok.com/@jeab_company2025?_r=1&_t=ZS-97Qq6cZUMVx" target="_blank" 
               class="block w-full bg-black-800 hover:bg-black-700 text-white p-4 rounded-xl font-medium transition border border-gray-700">
               TikTok
            </a>

            <!-- Facebook -->
             <a href="https://www.facebook.com/share/1Du9fGPf4t/?mibextid=wwXIfr" target="_blank" 
               class="block w-full bg-blue-800 hover:bg-blue-700 text-white p-4 rounded-xl font-medium transition border border-gray-700">
               Facebook
            </a>

           
        </div>

        <div class="mt-8 p-6 bg-gray-950 border border-gray-800 rounded-2xl">
    <h4 class="text-yellow-400 font-bold mb-4 uppercase tracking-wider text-sm flex items-center justify-center gap-2">
        <span class="text-xl"></span> Horarios de Atención
    </h4>
    
    <div class="space-y-2 text-gray-400 text-sm">
        <p>
            <span class="text-white font-semibold">Lunes a Viernes:</span> 
            <span class="text-yellow-400">7:00 AM - 4:00 PM</span>
        </p>
        <p>
            <span class="text-white font-semibold">Sábados:</span> 
            <span class="text-yellow-400">8:00 AM - 12:00 MD</span>
        </p>
    </div>
</div>

        <!-- Botón de retorno -->
      <a href="/" 
   class="inline-block mt-8 py-2 px-8 text-center border border-yellow-400 text-yellow-400 hover:bg-yellow-400 hover:text-gray-950 font-bold rounded-lg text-sm transition duration-300">
   Volver al Inicio
</a>
    </div>
</body>
</html>