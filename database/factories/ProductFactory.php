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
            'sku' => fake()->unique()->bothify('A###'),

            'name' => fake()->randomElement([
                'Ferrari 458 Italia',
                'Lamborghini Huracan',
                'McLaren 720S',
                'Bugatti Chiron'
            ]),

            'description' => fake()->sentence(),

            'price' => fake()->numberBetween(
                100000,
                500000
            ),

            'stock' => fake()->numberBetween(
                1,
                10
            ),

            'image' => 'car.jpg',

            'category' => 'Deportivos'
        ];
    }
}