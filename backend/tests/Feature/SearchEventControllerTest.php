<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SearchEventControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test__SearchEventController()
    {
        $keyword='富士';
        $response = $this->get('/api/event/search',['keyword'=>$keyword]);

        $response->assertStatus(200)
         ->assertJson([]);
    }
}
