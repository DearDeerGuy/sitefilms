<?php

namespace App\Http\Controllers;

use App\Models\Film;
use App\Models\FilmGenre;
use App\Models\Genre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules\ImageFile;
class FilmController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //$films = Film::where('publication_status', 1)->leftJoin('film_genres', 'films.id', '=', 'film_genres.film_id')->leftJoin('genres', 'genres.id', '=', 'film_genres.genre_id')->select('films.*', 'genres.name')->get();
        $films = Film::all()->where('publication_status', 1);
        $genres = Genre::all();
        return view('Films/index', ['films' => $films, 'genres' => $genres]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Films/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(['title' => 'required', 'poster' => 'mimes:jpeg,png,jpg,gif,svg']);
        $film = new Film();
        $film->title = $request->title;
        if(isset($request->poster)) {
            $image = $request->file('poster');
            $path = $image->store('posters', 'public');
            $film->poster = "http://sitefilms.site/storage/".$path;
        }
        else
            $film->poster = "http://sitefilms.site/storage/posters/default.jpg";

        $film->save();
        return redirect()->route('films.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        if(!isset($id))
            return redirect()->route('films.index');

        $film = Film::find($id);

        if(!$film)
            return redirect()->route('films.index');

        return view('Films/edit', ['film' => $film]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $request->validate(['id' => ['required', 'exists:films,id'], 'title' => 'required', 'poster' => 'mimes:jpeg,png,jpg,gif,svg']);

        $film = Film::find($request->id);
        $film->title = $request->title;
        if(isset($request->poster)) {
            $image = $request->file('poster');
            $path = $image->store('posters', 'public');
            $film->poster = "http://sitefilms.site/storage/".$path;
        }
        $film->save();

        return redirect()->route('films.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $film = Film::find($id);
        if($film)
            $film->delete();
        return redirect()->route('films.index');
    }

    public function complete($id) {
        $film = Film::find($id);
        if($film) {
            $film->publication_status = true;
            $film->save();
        }

        return redirect()->route('films.index');
    }

    public function addgenre($id)
    {
        $film = Film::find($id);
        if(!$film)
            return redirect()->route('films.index');
        $genres = Genre::all()->whereNotIn('id', FilmGenre::all()->where('film_id', $id)->pluck('genre_id'));
        return view('Films/addgenretofilm', ['film' => $film, 'genres' => $genres]);
    }
    public function addgenretofilm(Request $request)
    {
        $request->validate(['film_id' => ['required', 'exists:films,id'], 'genre_id' => ['required', 'exists:genres,id']]);

        $filmgenre = FilmGenre::all()->where('film_id', request('film_id'))->where('genre_id', request('genre_id'));
        if(!$filmgenre)
            return redirect()->back();
        $addgenre = new FilmGenre();
        $addgenre->film_id = $request->film_id;
        $addgenre->genre_id = $request->genre_id;
        $addgenre->save();
        return redirect()->route('films.index');
    }
}
