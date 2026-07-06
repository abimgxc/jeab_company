<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Usamos updateOrCreate para evitar errores si el usuario ya existe
        User::updateOrCreate(
            ['email' => 'test@example.com'], // Buscamos por email
            [
                'name' => 'Test User',
                'password' => Hash::make('12345678'),
            ]
        );

        // Llamamos a tu otro seeder
        $this->call(CompanySeeder::class);
    }
}