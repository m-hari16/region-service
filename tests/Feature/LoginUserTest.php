<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LoginUserTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_user_login_by_email_on_success()
    {
        $response = $this->postJson('/api/login', [
            'email' => 'developer@email.com',
            'password' => 'password'
        ]);

        $response->assertStatus(201);
    }

    public function test_user_login_without_email_client_error()
    {
        $response = $this->postJson('/api/login', [
            'password' => 'password'
        ]);

        $response->assertStatus(400);
    }

    public function test_user_login_with_invalid_email_type_client_error()
    {
        $response = $this->postJson('/api/login', [
            'email' => 'email',
            'password' => 'password'
        ]);

        $response->assertStatus(400);
    }

    public function test_user_login_without_password_client_error()
    {
        $response = $this->postJson('/api/login', [
            'email' => 'email',
        ]);

        $response->assertStatus(400);
    }

    public function test_user_login_with_invalid_password_type_client_error()
    {
        $response = $this->postJson('/api/login', [
            'email' => 'developer@email.com',
            'password' => 1200909
        ]);

        $response->assertStatus(400);
    }

    public function test_user_login_with_invalid_credentials_client_error()
    {
        $response = $this->postJson('/api/login', [
            'email' => 'developer@email.com',
            'password' => '12345678'
        ]);

        $response->assertStatus(401);
    }

}
