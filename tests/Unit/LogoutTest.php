<?php

namespace Tests\Unit;

use Tests\TestCase;

class LogoutTest extends TestCase
{

    private string $token = 'Place token here';

    public function testLogout() : void
    {
        $response = $this->withHeaders(['Authorization' => 'Bearer ' . $this->token])->get('/api/logout');
        $response->assertOK();
        $response->assertValid();
        $response->assertJsonIsObject();
        $response->assertJson(['status' => true, 'message' => 'You have loged out!']);
    }
}
