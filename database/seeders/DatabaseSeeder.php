<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. Crear el usuario de prueba (opcional, puedes dejarlo o borrarlo)
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        // 2. LLAMAR A TU COMPANYSEEDER
        // Aquí es donde vinculas tu archivo de servicios con la base de datos
        $this->call([
            CompanySeeder::class,
        ]);
    }
}