<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Esto creará a Emilio automáticamente si no existe
        User::firstOrCreate(
            ['email' => 'emilio@test.local'], // Si ya existe este correo, no lo duplica
            [
                'name' => 'Emilio',
                'password' => Hash::make('password123'), // Tu contraseña segura
                'role' => 'admin',
            ]
        );
    }
}
