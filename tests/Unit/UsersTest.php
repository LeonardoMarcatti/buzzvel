<?php

namespace Tests\Unit;

use Tests\TestCase;

class UsersTest extends TestCase
{
    /**
     * A basic unit test example.
     */

     private string $token = 'place token here';

    public function testListAllUsers(): void
    {
        $response = $this->withHeaders(['Authorization' => 'Bearer ' . $this->token])->getJson('/api/user/all');
        $response->assertOk();
        $response->assertJsonIsArray();
    }
}
