<?php

namespace Tests\Feature\Auth;

use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
# use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LoginTest extends TestCase
{
    use RefreshDatabase;
    public function login_as_test_user()
    {
         $loginData = ['email' => 'test@test.com', 'password' => 'test1234567'];
 
         $this->json('POST', 'api/login', $loginData, ['Accept' => 'application/json'])
             ->assertStatus(400)
             ->assertJsonStructure([
                "user" => [
                    'id',
                    'name',
                    'email',
                    'email_verified_at',
                    'created_at',
                    'updated_at',
                ],
                 "access_token",
                 "message"
             ]);
 
         $this->assertAuthenticated();
    }
}
