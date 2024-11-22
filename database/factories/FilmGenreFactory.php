<?php

namespace Database\Factories;

use App\Models\Film;
use App\Models\FilmGenre;
use App\Models\Genre;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\FilmGenre>
 */
class FilmGenreFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = FilmGenre::class;
    public function definition(): array
    {
        return [
            'film_id' => Film::get()->random()->id,
            'genre_id' => Genre::get()->random()->id,
        ];
    }
}
