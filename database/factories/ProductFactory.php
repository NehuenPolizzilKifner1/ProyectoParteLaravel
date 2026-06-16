<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Product>
 */
class ProductFactory extends Factory
{
    public function definition(): array
    {
        return [

            'name' => fake()->randomElement([
                'Porsche 911 Carrera GTS',
                'Ferrari SF90',
                'McLaren 720S',
                'Lamborghini Revuelto'
            ]),

            'price' => fake()->numberBetween(
                120000,
                600000
            ),

            'image' => 'imgs/car.webp',

            'motor' => fake()->randomElement([
                'V8',
                'V10',
                'V12',
                'Bóxer 6 Cilindros'
            ]),

            'potencia' => fake()->numberBetween(
                400,
                1000
            ) . ' CV',

            'aceleracion' => fake()->randomFloat(
                1,
                2,
                5
            ) . 's',

            'category' => 'Coches de Lujo'
        ];
    }
}