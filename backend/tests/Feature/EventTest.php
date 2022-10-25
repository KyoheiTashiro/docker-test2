<?php

namespace Tests\Feature;

// use App\Http\Controllers\Ajax\EventController;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class EventTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     * 
     */
    public function test__EventController()
    {
        $response=$this->get('api/event');
        

        $response->assertStatus(200)
        ->assertJson([]);

    }
}
