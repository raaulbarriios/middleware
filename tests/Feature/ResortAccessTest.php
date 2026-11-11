<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ResortAccessTest extends TestCase
{
    use RefreshDatabase;

    public function test_public_routes_are_accessible_without_auth(): void
    {
        $this->get('/')->assertStatus(200);
        $this->get('/login')->assertStatus(200);
        $this->get('/register')->assertStatus(200);
    }

    public function test_unauthenticated_users_are_redirected_from_private_areas(): void
    {
        $this->get('/panel')->assertRedirect('/login');
        $this->get('/casino')->assertRedirect('/login');
        $this->get('/admin')->assertRedirect('/login');
    }

    public function test_authenticated_minor_user_can_access_panel_but_not_casino_or_admin(): void
    {
        $minor = User::create([
            'name' => 'Menor',
            'email' => 'menor@test.com',
            'password' => bcrypt('password'),
            'is_admin' => false,
            'age' => 16,
        ]);

        $this->actingAs($minor)->get('/panel')->assertStatus(200);

        // Intento de acceso a casino -> redirección al panel con mensaje de error
        $response = $this->actingAs($minor)->get('/casino');
        $response->assertRedirect('/panel');
        $response->assertSessionHas('error', 'Acceso denegado: Debes ser mayor de edad');

        // Intento de acceso a admin -> 403
        $this->actingAs($minor)->get('/admin')->assertStatus(403);
    }

    public function test_authenticated_adult_normal_user_can_access_panel_and_casino_but_not_admin(): void
    {
        $adult = User::create([
            'name' => 'Adulto',
            'email' => 'adulto@test.com',
            'password' => bcrypt('password'),
            'is_admin' => false,
            'age' => 25,
        ]);

        $this->actingAs($adult)->get('/panel')->assertStatus(200);
        $this->actingAs($adult)->get('/casino')->assertStatus(200);
        $this->actingAs($adult)->get('/admin')->assertStatus(403);
    }

    public function test_authenticated_admin_user_can_access_all_areas(): void
    {
        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@test.com',
            'password' => bcrypt('password'),
            'is_admin' => true,
            'age' => 40,
        ]);

        $this->actingAs($admin)->get('/panel')->assertStatus(200);
        $this->actingAs($admin)->get('/casino')->assertStatus(200);
        $this->actingAs($admin)->get('/admin')->assertStatus(200);
    }
}
