<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Crear algunos roles si no existen
        $adminRole = Role::firstOrCreate(['name' => 'admin']);
        $benefactorRole = Role::firstOrCreate(['name' => 'benefactor']);
        $beneficiarioRole = Role::firstOrCreate(['name' => 'beneficiario']);
        $responsableRole = Role::firstOrCreate(['name' => 'responsable_parroquial']);

        // Crear usuarios y asignarles roles
        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => bcrypt('password123'),
        ]);
        $admin->assignRole($adminRole);

        $benefactor = User::create([
            'name' => 'Benefactor',
            'email' => 'benefactor@example.com',
            'password' => bcrypt('password123'),
        ]);
        $benefactor->assignRole($benefactorRole);

        $beneficiario = User::create([
            'name' => 'Beneficiario',
            'email' => 'beneficiario@example.com',
            'password' => bcrypt('password123'),
        ]);
        $beneficiario->assignRole($beneficiarioRole);

        $responsable = User::create([
            'name' => 'Responsable Parroquial',
            'email' => 'responsable@example.com',
            'password' => bcrypt('password123'),
        ]);
        $responsable->assignRole($responsableRole);
    }
}
