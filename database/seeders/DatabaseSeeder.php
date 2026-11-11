<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. Administrador mayor de edad
        User::create([
            'name' => 'Admin Usuario',
            'email' => 'admin@resort.com',
            'password' => bcrypt('password123'),
            'is_admin' => true,
            'age' => 35,
        ]);

        // 2. Usuario normal mayor de edad
        User::create([
            'name' => 'Cliente Adulto',
            'email' => 'adulto@resort.com',
            'password' => bcrypt('password123'),
            'is_admin' => false,
            'age' => 25,
        ]);

        // 3. Usuario normal menor de edad
        User::create([
            'name' => 'Cliente Menor',
            'email' => 'menor@resort.com',
            'password' => bcrypt('password123'),
            'is_admin' => false,
            'age' => 16,
        ]);
    }
}
