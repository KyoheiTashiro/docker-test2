<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Carbon\Carbon;

class MonthEventControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test__MonthEventController()
    {

        $year_month=new Carbon;
        
        $year_month->year('Y-m');
 

        $response = $this->get('api/event/month/'.$year_month);

        $response->assertStatus(200)
         ->assertJson([]);
    }
}
