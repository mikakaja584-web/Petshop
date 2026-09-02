<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Admin Account
        User::updateOrCreate(
            ['email' => 'admin@pawsy.com'],
            [
                'name' => 'Admin Pawsy',
                'password' => bcrypt('admin123'),
                'role' => 'admin',
            ]
        );

        // Regular User Account
        User::updateOrCreate(
            ['email' => 'user@pawsy.com'],
            [
                'name' => 'Jessica Putri',
                'password' => bcrypt('user123'),
                'role' => 'user',
            ]
        );

        // Additional Sample User
        User::updateOrCreate(
            ['email' => 'dimas@example.com'],
            [
                'name' => 'Dimas Prasetyo',
                'password' => bcrypt('user123'),
                'role' => 'user',
            ]
        );
    }
}
