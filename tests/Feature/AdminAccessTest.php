<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AdminAccessTest extends TestCase
{
    use RefreshDatabase;

    public function test_admin_can_access_products()
    {
        $admin = User::factory()->create([
            'role' => 'admin'
        ]);

        $response = $this
            ->actingAs($admin)
            ->get('/admin/products');

        $response->assertStatus(200);
    }

    public function test_normal_user_gets_403()
    {
        $user = User::factory()->create([
            'role' => 'user'
        ]);

        $response = $this
            ->actingAs($user)
            ->get('/admin/products');

        $response->assertStatus(403);
    }
}