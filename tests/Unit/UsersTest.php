<?php

namespace Tests\Unit;

use Tests\TestCase;

class UserTests
 extends TestCase
{
    /**
     * A basic unit test example.
     */

     private string $token = '1|Fb4LmWHnnnnuWIUIZDFMbdaCRgiRzaFAfN4N0Vbo6e0e62b6';

    public function testListAllUsers(): void
    {
        $response = $this->withHeaders(['Authorization' => 'Bearer ' . $this->token])->getJson('/api/user/all');
        $response->assertOk();
        $response->assertJsonIsArray();
    }
}
