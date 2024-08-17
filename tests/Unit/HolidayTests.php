<?php

namespace Tests\Unit;

use Tests\TestCase;
use PHPUnit\Framework\Attributes\DataProvider;

class HolidayTests extends TestCase
{
    private string $token = 'Place token here';

    public static function holidayProviderData() : array
    {
        return [
            ['title' => 'Holiday A', 'description' => 'Lets go to Acapulco!', 'date' => '2024-08-10', 'location' => 'Acapulco'],
            ['title' => 'Holiday B', 'description' => 'The city of love and lights', 'date' => '2022-10-05', 'location' => 'Paris'],
            ['title' => 'Holiday C', 'description' => 'Big Apple is a place to visit', 'date' => '2015-09-12', 'location' => 'New York'],
            ['title' => 'Holiday D', 'description' => 'This city was once called Kyoto', 'date' => '2018-12-08', 'location' => 'Tokyio'],
        ];
    }

    public  static function idProvider() : array
    {
        return [[1], [2], [3], [4]];
    }

    public  static function updateProvider() : array
    {
        return [
            [1, 'title' => 'Holiday A updated', 'description' => 'Lets go to Acapulco updated!', 'date' => '1978-10-14', 'location' => 'Acapulco updated'],
            [2, 'title' => 'Holiday B updated', 'description' => 'The city of love and lights updated!', 'date' => '1978-10-14', 'location' => 'Paris updated'],
            [3, 'title' => 'Holiday C updated', 'description' => 'Big Apple is a place to visit updated!', 'date' => '1978-10-14', 'location' => 'New York updated'],
            [4, 'title' => 'Holiday D updated', 'description' => 'This city was once called Kyoto updated!', 'date' => '1978-10-14', 'location' => 'Tokyio updated']
        ];
    }

    #[DataProvider('holidayProviderData')]
    public function testCreateHoliday(string $title, string $description, string $date, string $location) : void
    {
    //    $this->markTestSkipped('ok');
        $response = $this->withHeaders(['Authorization' => 'Bearer ' . $this->token])->postJson('/api/holiday/new', ['title' => $title, 'description' => $description, 'date' => $date, 'location' => $location]);
        $response->assertOK();
        $response->assertValid();
        $response->assertJsonIsObject();
        $response->assertJson(['status' => true, 'message' => 'Holiday created!']);
    }

    public function testGetAllHolidays(): void
    {
    //    $this->markTestSkipped('ok');
        $response = $this->withHeaders(['Authorization' => 'Bearer ' . $this->token])->getJson('/api/holiday/all');
        $response->assertOk();
        $response->assertJsonIsArray();
        $response->assertJsonCount(4);
        $response->assertJson([0 => ["id" => 1, "title"=> "Holiday A", "description"=> "Lets go to Acapulco!", "location"=> "Acapulco", "date"=> "2024-08-10", "participants"=> []],
            1 => ["id"=> 2, "title"=> "Holiday B", "description"=> "The city of love and lights", "location"=> "Paris", "date"=> "2022-10-05", "participants"=> []],
            2 => ["id"=> 3, "title"=> "Holiday C", "description"=> "Big Apple is a place to visit", "location"=> "New York", "date"=> "2015-09-12",  "participants"=> []],
            3 => ["id"=> 4, "title"=> "Holiday D", "description"=> "This city was once called Kyoto", "location"=> "Tokyio", "date"=> "2018-12-08", "participants"=> []],
        ]);
    }

    #[DataProvider('idProvider')]
    public function testgetHolydayById(int $id) : void
    {
    //    $this->markTestSkipped('ok');
        $response = $this->withHeaders(['Authorization' => 'Bearer ' . $this->token])->getJson('/api/holiday/' . $id);
        $response->assertOk();
        $response->assertJsonIsObject();
        $response->assertJsonCount(2);
        $response->assertJson(['status' => true, 'holiday' => ['id' => $id]]);
    }

    #[DataProvider('updateProvider')]
    public function testUpdateHoliday(int $id, string $title, string $description, string $date, string $location) : void
    {
    //    $this->markTestSkipped('ok');
        $response = $this->withHeaders(['Authorization' => 'Bearer ' . $this->token])->patchJson('/api/updateHoliday/' . $id, ['description' => $description, 'title' => $title, 'date' => $date, 'location' => $location]);
        $response->assertOK();
        $response->assertValid();
        $response->assertJsonIsObject();
        $response->assertJson(['status' => true, 'message' => 'Holiday updated!']);
    }

    public function testGetAllHolidaysUpdated(): void
    {
    //    $this->markTestSkipped('ok');
        $response = $this->withHeaders(['Authorization' => 'Bearer ' . $this->token])->getJson('/api/holiday/all');
        $response->assertOk();
        $response->assertJsonIsArray();
        $response->assertJsonCount(4);
        $response->assertJson([0 => ["id" => 1, "title"=> "Holiday A updated", "description"=> "Lets go to Acapulco updated!", "location"=> "Acapulco updated", "date"=> "1978-10-14", "participants"=> []],
            1 => ["id"=> 2, "title"=> "Holiday B updated", "description"=> "The city of love and lights updated!", "location"=> "Paris updated", "date"=> "1978-10-14", "participants"=> []],
            2 => ["id"=> 3, "title"=> "Holiday C updated", "description"=> "Big Apple is a place to visit updated!", "location"=> "New York updated", "date"=> "1978-10-14",  "participants"=> []],
            3 => ["id"=> 4, "title"=> "Holiday D updated", "description"=> "This city was once called Kyoto updated!", "location"=> "Tokyio updated", "date"=> "1978-10-14", "participants"=> []],
        ]);
    }

    #[DataProvider('idProvider')]
    public function testGetPdf(int $id) : void
    {
    //    $this->markTestSkipped('ok');
        $response = $this->withHeaders(['Authorization' => 'Bearer ' . $this->token])->getJson('/api/holiday/pdf/' . $id);
        $response->assertOk();
        $response->assertDownload();
    }
}
