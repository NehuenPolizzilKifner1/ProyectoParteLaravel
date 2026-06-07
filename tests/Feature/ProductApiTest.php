<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProductApiTest extends TestCase
{
    use RefreshDatabase;

    public function test_products_endpoint_returns_200()
    {
        Product::factory()->create();

        $response = $this->getJson('/api/products');

        $response->assertStatus(200);
    }

    public function test_product_show_returns_data()
    {
        $product = Product::factory()->create();

        $response = $this->getJson(
            '/api/products/' . $product->id
        );

        $response->assertStatus(200);

        $response->assertJsonFragment([
            'id' => $product->id
        ]);
    }
}