<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::create([
            'sku' => 'A001',
            'name' => 'Ferrari 458 Italia',
            'description' => 'Modelo más famoso de Ferrari',
            'price' => 250000,
            'stock' => 5,
            'image' => 'imgs/ferrari.png',
            'category' => 'Superdeportivo'
        ]);

        Product::create([
            'sku' => 'A002',
            'name' => 'Yamaha NMAX',
            'description' => 'Modelo moderno de Yamaha',
            'price' => 30000,
            'stock' => 4,
            'image' => 'imgs/motodeportiva.png',
            'category' => 'Motocicleta'
        ]);
    }
}
