<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Superadmin (tu cuenta)
        $superAdmin = User::firstOrCreate(
            ['email' => 'yo@gestok.com'],
            [
                'name' => 'Super Admin',
                'password' => bcrypt('Password2025*'),           ]
        );
        $superAdmin->assignRole('superadmin');

        //Admin
        $admin = User::firstOrCreate(
            ['email' => 'admin@gestok.com'],
            [
                'name' => 'Admin',
                'password' => bcrypt('Password2025*'),
            ]
        );
        $admin->assignRole('admin');



        // Usuario de prueba normal
        $user = User::firstOrCreate(
            ['email' => 'user@gestok.com'],
            [
                'name' => 'Usuario Normal',
                'password' => bcrypt('Password2025*'),
            ]
        );
        $user->assignRole('user');
    }
}
