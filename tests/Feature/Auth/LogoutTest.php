<?php

namespace Tests\Feature\Auth;

use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LogoutTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_logout()
    {
        $user = User::first();
        $token = \JWTAuth::fromUser($user);

        $this->post('api/auth/logout?token=' . $token)
            ->assertStatus(200);

        $this->assertGuest('api');
    }
}
