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
        User::firstOrCreate(
            ['email' => 'emilio@test.local'],
            [
                'name' => 'Emilio',
                'password' => Hash::make('password123'),
                'role' => 'admin',
            ]
        );

        // 2. LLAMAR A TU NUEVO SEEDER DE SERVICIOS E INDICADORES:
        $this->call(CompanySeeder::class);
    }
}
