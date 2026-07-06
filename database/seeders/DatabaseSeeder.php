<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Crear usuario Admin (Emilio)
        User::factory()->create([
    'name' => 'Test User',
    'email' => 'test@example.com',
    'password' => Hash::make('12345678'), // <-- AGREGA ESTA LÍNEA AQUÍ
]);

        // 2. LLAMAR A TU NUEVO SEEDER DE SERVICIOS E INDICADORES:
        $this->call(CompanySeeder::class);
    }
}
