<?php

namespace Tests\Unit;

use Tests\TestCase;

class ErrorsTests extends TestCase
{
    private string $token = 'Place token here';

    public function testWithNoToken() : void
    {
        $response = $this->getJson('/api/logout');
        $response->assertUnauthorized();
        $response->assertJson(['message' => 'Unauthenticated.']);
    }

    public function testWithWrongToken() : void
    {
        $response = $this->withHeaders(['Authorization' => 'Bearer ' . 'wrong token'])->getJson('/api/logout');
        $response->assertUnauthorized();
        $response->assertJson(['message' => 'Unauthenticated.']);
    }

    public function testWrongUrl(): void
    {
        $response = $this->getJson('/api/wrongURL');
        $response->assertNotFound();
    }

    public function testInvalidSentData() : void
    {
        $response = $this->withHeaders(['Authorization' => 'Bearer ' . $this->token])->postJson('/api/login', [ 'name' => 'John Doe', 'password' => 123456]);
        $response->assertUnprocessable();
    }

    public function testWrongRequestVerb() : void
    {
        $response = $this->withHeaders(['Authorization' => 'Bearer ' . $this->token])->postJson('/api/user/all');
        $response->assertMethodNotAllowed();
    }
}
