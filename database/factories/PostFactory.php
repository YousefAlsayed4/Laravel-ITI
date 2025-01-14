<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

//use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title'         => fake()->sentence,
            'body'          => fake()->paragraphs(3, true),
            'enabled'       => fake()->boolean,
            'published_at'  => fake()->dateTimeBetween('-1 year', 'now'),
            'user_id'       => fake()->numberBetween(1, 20)
        ];
    }
}