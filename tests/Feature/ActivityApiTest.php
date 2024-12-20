<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ActivityApiTest extends TestCase
{
    public function test_call_list_of_activities()
    {
        $this->get('/api/activity')
            ->assertStatus(200)
            ->assertJsonStructure([])
            ->assertJsonCount(10, 'data');
    }

    public function test_call_activity()
    {
        $this->get('/api/activity/1')
            ->assertStatus(200)
            ->assertJsonStructure([]);
    }

}
