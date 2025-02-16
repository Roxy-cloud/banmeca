<?php

namespace Database\Seeders;

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User; // 
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Verifica si ya existe un usuario admin para evitar duplicados
        if (!User::where('email', 'admin@example.com')->exists()) {
            User::create([
                'name' => 'Admin User', // Nombre del usuario
                'email' => 'admin@example.com', // Correo electrónico del usuario admin
                'password' => Hash::make('password123'), // Contraseña (asegurada)
                'role' => 'admin', // Asigna el rol de admin al usuario
            ]);
        }
    }
}
