<?php

namespace Tests\Unit;

use Tests\TestCase;

class ErrorsTest extends TestCase
{
    public function testWithNoToken() : void
    {
        $this->markTestSkipped('Implement later');
    }

    public function testWithWrongToken() : void
    {
        $this->markTestSkipped('Implement later');
    }

    public function testListAllUsers(): void
    {
        $this->markTestSkipped('Implement later');
        $response = $this->getJson('/api/user/all');
        $response->assertJsonIsObject();
        $response->assertStatus(401);
        $response->assertUnauthorized();
    }

    public function testLogout() : void
    {
        $this->markTestSkipped('Implement later');
        $response = $this->withHeaders(['Authorization' => 'Bearer ' . '10|iH7UQ1e0dIA3M5kvvFpn3ouvDqeU2BFbZlSFMw9Za4767b84'])->get('/api/logout');
        $response->assertJsonIsObject();
        $response->assertUnauthorized();
    }
}
