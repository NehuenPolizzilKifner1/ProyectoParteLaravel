<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\User;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $vendor = User::where(
            'role',
            'vendor'
        )->first();

        Product::create([
            'name' => 'Porsche 911 Carrera GTS',
            'potencia' => 480,
            'price' => 160000,
            'motor' => 'Boxer 6 Cilindros',
            'image' => '/imgs/porsche911.webp',
            'category' => 'Coches de Lujo',
            'aceleracion' => 3.4,
            'user_id' => $vendor->id
        ]);

        Product::create([
            'name' => 'Lamborghini Aventador',
            'potencia' => 740,
            'price' => 420000,
            'motor' => 'V12 Atmosferico',
            'image' => '/imgs/lambo.jpg',
            'category' => 'Coches de Lujo',
            'aceleracion' => 2.9,
            'user_id' => $vendor->id
        ]);
    }
}