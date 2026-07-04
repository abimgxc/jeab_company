<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Servicio;
use App\Models\Indicador;

class CompanySeeder extends Seeder
{
    public function run(): void
    {
        // Solo guardamos el nombre del archivo como texto
        Servicio::create([
            'titulo' => 'Redes Eléctricas en Baja y Media Tensión',
            'descripcion' => 'Diseño, tendido y acoplamiento estructural de líneas de distribución aérea y subterránea según normativas de seguridad.',
            'icono' => 'redes-tension.jpeg' 
        ]);

        Servicio::create([
            'titulo' => 'Redes de Polarización',
            'descripcion' => 'Instalación y medición de sistemas de puesta a tierra. Precio: $75.00',
            'icono' => 'polarizacion.jpeg'
        ]);

        Servicio::create([
            'titulo' => 'Trámites con OIA y Distribuidoras',
            'descripcion' => 'Gestión de carpetas técnicas y planos. Precio: $75.00',
            'icono' => 'tramites-oia.jpeg'
        ]);

        Servicio::create([
            'titulo' => 'Instalaciones Eléctricas',
            'descripcion' => 'Montaje integral de tableros, acometidas y cableados estructurados.',
            'icono' => 'instalaciones.jpeg'
        ]);

        Servicio::create([
            'titulo' => 'Visita Técnica e Inspección',
            'descripcion' => 'Evaluación detallada en sitio. Precio: $10.00 - $25.00',
            'icono' => 'visita-tecnica.jpeg'
        ]);

        Servicio::create([
            'titulo' => 'Mantenimientos PROEM',
            'descripcion' => 'Programa de revisión y optimización eléctrica mensual.',
            'icono' => 'proem.jpeg'
        ]);

        Indicador::create(['cifra' => '10+', 'texto' => 'Años de Trayectoria']);
        Indicador::create(['cifra' => '150+', 'texto' => 'Proyectos Ejecutados']);
        Indicador::create(['cifra' => '50+', 'texto' => 'Clientes Satisfechos']);
    }
}