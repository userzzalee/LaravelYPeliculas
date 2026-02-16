<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        // Crear usuario admin
        User::create([
            'name' => 'Administrador',
            'email' => 'admin@admin.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
        ]);

        // Crear usuarios normales
        User::create([
            'name' => 'Juan Pérez',
            'email' => 'juan@example.com',
            'password' => Hash::make('password'),
        ]);

        User::create([
            'name' => 'María López',
            'email' => 'maria@example.com',
            'password' => Hash::make('password'),
        ]);

        User::create([
            'name' => 'Carlos Gómez',
            'email' => 'carlos@example.com',
            'password' => Hash::make('password'),
        ]);
    }
}
