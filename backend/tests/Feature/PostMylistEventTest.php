<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;

class PostMylistEventTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test__PostMylistEventContoller()
    {
      
        $user = User::find(2);
        

        $response = $this->actingAs($user)
        ->postJson('api/event/post-mylist',['event' => 51]);
        
        $response->assertStatus(200);
        
    }
}
