<?php

namespace Tests\Unit;

use Tests\TestCase;
use PHPUnit\Framework\Attributes\Depends;

class AuthTests
 extends TestCase
{
    public function testLogup() : void
    {
        $response = $this->postJson('/api/logup', ['name' => 'John Doe', 'email' => 'johnDoe@test.com', 'password' => 123456, 'password_confirmation' => 123456]);
        $response->assertOK();
        $response->assertValid();
        $response->assertJsonIsObject();
        $response->assertJson(['status' => true, 'message' => 'User created!']);
    }

    public function testLogin() : string
    {
        $response = $this->postJson('/api/login', ['email' => 'johnDoe@test.com', 'password' => 123456]);
        $response->assertStatus(200);
        $response->assertJsonIsObject();
        $response->assertJson(['status' => true]);
        $response->dump();
        return $response['token'];
    }

    // #[Depends('testLogin')]
    // public function testLogout(string $token) : void
    // {
    //     $response = $this->withHeaders(['Authorization' => 'Bearer ' . $token])->get('/api/logout');
    //     $response->assertOK();
    //     $response->assertValid();
    //     $response->assertJsonIsObject();
    //     $response->assertJson(['status' => true, 'message' => 'You have loged out!']);
    // }

}
