<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Review;
use App\Models\Product;
use App\Models\User;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void{
        Review::create([

            'product_id' => Product::first()->id,

            'user_id' => User::first()->id,

            'stars' => 5,

            'comment' =>
                'El mejor coche que he conducido.',

            'review_date' =>
                now()
        ]);
    }
}
