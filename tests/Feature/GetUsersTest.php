<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class GetUsersTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testGetUsers()
    {
        $response = $this->json('GET', 'api/user/get-by-country', ['country' => 'Canada']);

        $response->assertStatus(200);
    }
}
