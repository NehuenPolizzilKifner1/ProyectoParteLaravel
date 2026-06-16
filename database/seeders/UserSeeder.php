<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Gerente',
            'email' => 'admin@test.com',
            'password' => Hash::make('12345678'),
            'role' => 'admin'
        ]);

        User::create([
            'name' => 'Vendedor',
            'email' => 'vendor@test.com',
            'password' => Hash::make('12345678'),
            'role' => 'vendor'
        ]);

        User::create([
            'name' => 'Editor',
            'email' => 'editor@test.com',
            'password' => Hash::make('12345678'),
            'role' => 'editor'
        ]);

        User::create([
            'name' => 'Usuario',
            'email' => 'user@test.com',
            'password' => Hash::make('12345678'),
            'role' => 'user'
        ]);
    }
}
