<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Movie>
 */
class MovieFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title'   => $this->faker->sentence(5),
            'description' => $this->faker->paragraph(5),
            'url' => $this->faker->imageUrl(640, 480,'movies', true),   
            'genre'   => $this->faker->sentence(5),
            'user_id' => User::factory(1)->create()->first(),
        ];
    }
}
