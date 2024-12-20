<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ActivityApiTest extends TestCase
{
    public function test_call_list_of_activities()
    {
        $response = $this->getJson('/api/activity');

        $response->assertStatus(200)
            ->assertJsonStructure([
                'data' => [
                    '*' => [
                        'id',
                        'activity_type',
                        'activity_name',
                        'activity_description',
                        'start_time',
                        'end_time',
                        'location',
                        'company_user_role_id',
                        'company_id',
                        'is_published',
                        'is_active',
                        'created_at',
                        'updated_at',
                    ],
                ],
                'meta' => [
                    'links' => [
                        'first',
                        'last',
                        'previous',
                        'next',
                    ],
                ],
            ]);
    }

    public function test_call_activity()
    {
        $this->get('/api/activity/1')
            ->assertStatus(200)
            ->assertJsonStructure([]);
    }

}
