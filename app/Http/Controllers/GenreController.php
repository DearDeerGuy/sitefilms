<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('Genres/index', ['genres' => Genre::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Genres/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(['name' => ['required', 'unique:genres,name']]);
        $genre = new Genre();
        $genre->name = $request->name;
        $genre->save();
        return redirect()->route('genres.index');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $genre = Genre::find($id);
        if(!$genre)
            return redirect()->route('genres.index');
        return view('Genres/edit', ['genre' => $genre]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $request->validate(['id' => ['required', 'exists:genres,id'], 'name' => ['required', 'unique:genres,name']]);
        $genre = Genre::find($request->id);
        $genre->name = $request->name;
        $genre->save();
        return redirect()->route('genres.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $genre = Genre::find($id);
        if($genre)
            $genre->delete();
        return redirect()->route('genres.index');
    }
}
