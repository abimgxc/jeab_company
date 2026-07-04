<div id="formulario_cotizacion" class="text-center mb-12">
    <h2 class="text-4xl font-bold text-yellow-400">Solicitar Cotización</h2>
    <p class="text-gray-400 mt-3 max-w-2xl mx-auto">
        Complete la información para que nuestro equipo técnico evalúe su proyecto.
    </p>
</div>

<form action="{{ route('cotizacion.store') }}" method="POST" enctype="multipart/form-data" 
      class="max-w-4xl mx-auto bg-gray-900 border border-yellow-400/20 p-8 md:p-12 rounded-3xl shadow-2xl">
    
    @csrf

    <h3 class="text-yellow-400 text-xl font-bold mb-8 border-b border-gray-700 pb-3">Información del Cliente</h3>

    <div class="mb-6">
        <label class="block text-gray-300 font-semibold mb-2">Tipo de Cliente</label>
        <select name="tipo_cliente" id="tipo_cliente" onchange="mostrarCampos()" 
                class="w-full p-3 rounded-xl bg-gray-800 border border-yellow-400/40 text-white focus:border-yellow-400 focus:ring-1 focus:ring-yellow-400 transition">
            <option value="particular">Cliente Natural</option>
            <option value="empresa">Empresa</option>
        </select>
    </div>

    <div class="grid md:grid-cols-2 gap-4 mb-6">
        <input type="text" name="nombre" placeholder="Nombre completo" class="w-full p-3 rounded-xl bg-gray-800 border border-yellow-400/40 text-white placeholder-gray-400 focus:border-yellow-400 transition">
        <input type="text" name="telefono" placeholder="Teléfono" class="w-full p-3 rounded-xl bg-gray-800 border border-yellow-400/40 text-white placeholder-gray-400 focus:border-yellow-400 transition">
        <input type="email" name="email" placeholder="Correo electrónico" class="w-full p-3 rounded-xl bg-gray-800 border border-yellow-400/40 text-white placeholder-gray-400 focus:border-yellow-400 transition">
        <input type="text" name="direccion" placeholder="Dirección" class="w-full p-3 rounded-xl bg-gray-800 border border-yellow-400/40 text-white placeholder-gray-400 focus:border-yellow-400 transition">
    </div>

    <div id="campos_particular" class="mb-6">
        <input type="text" name="dui" placeholder="DUI" class="w-full p-3 rounded-xl bg-gray-800 border border-yellow-400/40 text-white placeholder-gray-400 focus:border-yellow-400 transition">
    </div>

    <div id="campos_empresa" class="hidden space-y-4 mb-6">
        <input type="text" name="nit" placeholder="Número de NIT" class="w-full p-3 rounded-xl bg-gray-800 border border-yellow-400/40 text-white placeholder-gray-400 focus:border-yellow-400 transition">
        <input type="text" name="giro" placeholder="Giro del negocio" class="w-full p-3 rounded-xl bg-gray-800 border border-yellow-400/40 text-white placeholder-gray-400 focus:border-yellow-400 transition">
        
        <div>
            <label class="block text-gray-400 text-sm mb-2">Tarjeta de IVA:</label>
            <input type="file" name="archivo_iva[]" multiple class="w-full p-3 rounded-xl bg-gray-800 border border-yellow-400/40 text-white file:bg-yellow-400 file:border-0 file:rounded-lg file:px-4 file:py-2">
        </div>
    </div>

    <div class="mb-6">
        <label class="block text-gray-300 font-semibold mb-2">Servicio Solicitado</label>
        <select name="servicio" required class="w-full p-3 rounded-xl bg-gray-800 border border-yellow-400/40 text-white focus:border-yellow-400 transition">
            <option value="">Seleccione un servicio</option>
            <option value="Redes Eléctricas en Baja y Media Tensión">Redes Eléctricas en Baja y Media Tensión</option>
            <option value="Redes de Polarización">Redes de Polarización</option>
        </select>
    </div>

    <div class="mb-8">
        <label class="block text-gray-300 font-semibold mb-2">Descripción del Proyecto</label>
        <textarea name="descripcion" rows="4" placeholder="Detalles adicionales..." class="w-full p-3 rounded-xl bg-gray-800 border border-yellow-400/40 text-white placeholder-gray-400 focus:border-yellow-400 transition"></textarea>
    </div>

    <button type="submit" class="w-full bg-yellow-400 hover:bg-yellow-500 text-gray-950 py-4 rounded-xl font-bold text-lg transition duration-300">
        Enviar Solicitud
    </button>
</form>

<script>
function mostrarCampos() {
    // 1. Obtiene el valor actual del select
    let tipo = document.getElementById('tipo_cliente').value;
    
    // 2. Si el tipo no es igual al elemento, agrega la clase 'hidden' (oculta).
    // Si es igual, remueve la clase 'hidden' (muestra).
    document.getElementById('campos_empresa').classList.toggle('hidden', tipo !== 'empresa');
    document.getElementById('campos_particular').classList.toggle('hidden', tipo !== 'particular');
}
</script>