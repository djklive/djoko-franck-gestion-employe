<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        // Vérifie si l'admin existe déjà pour éviter les doublons
        if (!User::where('email', 'admin@grh.com')->exists()) {
            User::create([
                'name'     => 'Administrateur',
                'email'    => 'admin@grh.com',
                'password' => Hash::make('Admin@1234'),
                'role'     => 'admin',
            ]);
        }
    }
}