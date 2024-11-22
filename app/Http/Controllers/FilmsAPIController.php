<?php

namespace App\Http\Controllers;

use App\Models\Film;
use App\Models\Genre;
use Illuminate\Http\Request;

class FilmsAPIController extends Controller
{
    public function getGenres() {
        $genres = Genre::paginate(10);
        return response()->json($genres);
    }
    public function getFilms($id) {
        $films = Film::join('film_genres', 'film_genres.film_id', '=', 'films.id')->join('genres', 'film_genres.genre_id', '=', 'genres.id')->where('genres.id', $id)->paginate(10);
        return response()->json($films);
    }
    public function getFilmsList() {
        $films = Film::paginate(10);
        return response()->json($films);
    }
    public function getFilm($id) {
        $film = Film::find($id);
        return response()->json($film);
    }
}
