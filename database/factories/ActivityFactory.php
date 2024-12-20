<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Activity;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Activity>
 */
class ActivityFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'company_id' => \App\Models\Company::pluck('id')->random(),
            'company_user_role_id' => \App\Models\CompanyUserRole::pluck('id')->random(),
            'activity_type' => Activity::getRandomActivityType(),
            'activity_name' => fake()->sentence,
            'activity_description' => fake()->paragraph,
            'start_time' => fake()->dateTime,
            'end_time' => fake()->dateTime,
            'location' => fake()->address,
            'is_published' => fake()->boolean,
            'is_active' => fake()->boolean
        ];
    }
}
