
<section id="visita-tecnica" class="py-24 bg-gray-900">

    <div class="max-w-5xl mx-auto px-6">

        <div class="text-center mb-12">
            <span class="text-yellow-400 uppercase tracking-widest text-sm font-semibold">
                Atención Técnica
            </span>

            <h2 class="text-4xl md:text-5xl font-bold text-white mt-3">
                Solicitar Visita Técnica
            </h2>

            <p class="text-gray-400 mt-4 max-w-2xl mx-auto">
                Programe una visita con nuestros técnicos e ingenieros para evaluar su proyecto y brindarle una solución personalizada.
            </p>
        </div>

        <form action="/visitas"
              method="POST"
              enctype="multipart/form-data"
              class="bg-gray-950 border border-yellow-400/20 rounded-3xl p-8 md:p-10 shadow-2xl">

            @csrf

            <div class="grid md:grid-cols-2 gap-5">

                <input type="text"
                       name="nombre"
                       placeholder="Nombre completo"
                       class="bg-gray-900 border border-gray-700 rounded-xl p-4 text-white">

                <input type="email"
                       name="correo"
                       placeholder="Correo electrónico"
                       class="bg-gray-900 border border-gray-700 rounded-xl p-4 text-white">

                <input type="text"
                       name="telefono"
                       placeholder="Teléfono"
                       class="bg-gray-900 border border-gray-700 rounded-xl p-4 text-white">

                <input type="text"
                       name="responsable"
                       placeholder="Responsable en sitio"
                       class="bg-gray-900 border border-gray-700 rounded-xl p-4 text-white">

            </div>

            <textarea name="ubicacion"
                      placeholder="Ubicación exacta"
                      rows="3"
                      class="w-full mt-5 bg-gray-900 border border-gray-700 rounded-xl p-4 text-white"></textarea>

            <div class="grid md:grid-cols-2 gap-5 mt-5">

               <input type="date"
                      name="fecha"
                      min="{{ date('Y-m-d') }}"
                      class="bg-gray-900 border border-gray-700 rounded-xl p-4 text-white">

              <input type="time"
                         name="hora"
                         class="bg-gray-900 border border-gray-700 rounded-xl p-4 text-white">
            </div>

            <!--pomer hora de la visita-->
                <script>
const fechaInput = document.getElementById('fecha-visita');
const horaInput = document.getElementById('hora-visita');

       fechaInput.addEventListener('change', function() {
       const fechaSeleccionada = new Date(this.value);
    const diaSemana = fechaSeleccionada.getUTCDay(); // 0 = Domingo, 1 = Lunes, ..., 6 = Sábado

    // Limpiar restricciones previas
    horaInput.value = '';

    if (diaSemana === 0) { // Domingo
        alert("Lo sentimos, no realizamos visitas los domingos.");
        this.value = '';
    } else if (diaSemana === 6) { // Sábado
        horaInput.min = "08:00";
        horaInput.max = "12:00";
    } else { // Lunes a Viernes
        horaInput.min = "07:00";
        horaInput.max = "16:00";
    }
});
</script>
                 

            

            <textarea name="descripcion"
                      placeholder="Describa brevemente la necesidad o problema"
                      rows="4"
                      class="w-full mt-5 bg-gray-900 border border-gray-700 rounded-xl p-4 text-white"></textarea>

            <div class="mt-8 text-center">

                <button type="submit"
                        class="bg-yellow-400 hover:bg-yellow-500 text-black font-bold px-10 py-4 rounded-xl transition">
                    Solicitar Visita Técnica
                </button>

            </div>

        </form>

    </div>

</section>