<?php

namespace Tests\Unit;

use PHPUnit\Framework\Attributes\DataProvider;
use Tests\TestCase;

class ParticipantsTests extends TestCase
{
    private string $token = '1|Fb4LmWHnnnnuWIUIZDFMbdaCRgiRzaFAfN4N0Vbo6e0e62b6';

    public static function nameProvider() : array
    {
        return [
            ['Participant 1'], ['Participant 2'], ['Participant 3'], ['Participant 4']
        ];
    }

    public  static function participantProvider() : array
    {
        return [[1], [2], [3], [4], ['Participant']];
    }

    public  static function updateProvider() : array
    {
        return [
            [1, 'Participant 1 updated!'], [2, 'Participant 2 updated!'], [3, 'Participant 3 updated!'], [4, 'Participant 4 updated!']
        ];
    }

    #[DataProvider('nameProvider')]
    public function testCreateParticipant(string $name): void
    {
        $this->markTestSkipped('OK');
        $response = $this->withHeaders(['Authorization' => 'Bearer ' . $this->token])->postJson('/api/participants/new', ['name' => $name]);
        $response->assertValid();
        $response->assertOk();
        $response->assertJsonIsObject();
        $response->assertJson(['status' => true, 'message' => 'Participant created!']);
    }

    public function testGetAllParticipants() : void
    {
        $this->markTestSkipped('OK');
        $response = $this->withHeaders(['Authorization' => 'Bearer ' . $this->token])->getJson('/api/participants/all');
        $response->assertOk();
        $response->assertJsonIsObject();
        $response->assertJson(['status' => true, 'participants' => [['id' => 1, 'name' => 'Participant 1'], ['id' => 2, 'name' => 'Participant 2'], ['id' => 3, 'name' => 'Participant 3'], ['id' => 4, 'name' => 'Participant 4']]]);
    }

    #[DataProvider('participantProvider')]
    public function testGetParticipant(int|string $participant) : void
    {
        $this->markTestSkipped('OK');
        $response = $this->withHeaders(['Authorization' => 'Bearer ' . $this->token])->getJson('/api/participants/getParticipant/' . $participant);
        $response->assertOk();
        $response->assertValid();
        $response->assertJsonIsObject();
        $response->assertJson(['status' => true, 'participant' => []]);
    }

    #[DataProvider('updateProvider')]
    public function testUpdateParticipant(int $id, string $name) : void
    {
        $response = $this->withHeaders(['Authorization' => 'Bearer ' . $this->token])->patchJson('/api/updateparticipant/' . $id, ['name' => $name]);
        $response->assertOk();
        $response->assertValid();
        $response->assertJsonIsObject();
        $response->assertJson(['status' => true, 'message' => 'Participant updated!']);
    }

    public function testGetAllParticipantsAfterUpdated() : void
    {
        $response = $this->withHeaders(['Authorization' => 'Bearer ' . $this->token])->getJson('/api/participants/all');
        $response->assertOk();
        $response->assertJsonIsObject();
        $response->assertJson(['status' => true, 'participants' => [['id' => 1, 'name' => 'Participant 1 updated!'], ['id' => 2, 'name' => 'Participant 2 updated!'], ['id' => 3, 'name' => 'Participant 3 updated!'], ['id' => 4, 'name' => 'Participant 4 updated!']]]);
    }

}
