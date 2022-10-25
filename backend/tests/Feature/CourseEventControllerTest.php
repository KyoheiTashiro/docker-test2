<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CourseEventControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test__CourseEventController()
    {
        $course_name='sodegaura';
        $response = $this->get('api/event/course/'.$course_name);

        $response->assertStatus(200)
        ->assertJson([]);
    }
}
