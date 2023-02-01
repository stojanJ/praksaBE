<?php

namespace Database\Factories;
use App\Models\Movie;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Like>
 */
class LikeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
           'like' => $this->faker->numberBetween(0, 1000),
           'dislike'=> $this->faker->numberBetween(0, 1000),
           'movie_id'=>Movie::factory(1)->create()->first(),
           'user_id'=>Movie::factory(1)->create()->first(),

        ];
    }
}
