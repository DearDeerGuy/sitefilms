<?php

namespace Database\Factories;

use App\Models\Film;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Film>
 */
class FilmFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Film::class;
    public function definition(): array
    {
        return [
            'title' => $this->faker->words(3, true),
            'poster' => $this->faker->imageUrl(),
        ];
    }
}
