@extends('layout')

@section('content')
<div style="display: flex; flex-wrap: wrap; justify-content: space-around; position: absolute; align-content: space-around; height: 100%">
    @foreach($films as $film)
        <div class="card" style="width: 18rem;">
            <img src="{{$film->poster}}" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">{{$film->title}}</h5>
                @foreach($genres as $genre)
                    @if(App\Models\FilmGenre::all()->where('film_id', $film->id)->where('genre_id', $genre->id)->first())
                        <span>{{$genre->name}} </span>
                    @endif
                @endforeach
            </div>
            <div class="card-body">
                <a href="/films/{{$film->id}}/edit" class="card-link">Edit</a>
                <a href="/films/{{$film->id}}/delete" class="card-link">Delete</a>
                <a href="/films/{{$film->id}}/addgenre" class="card-link">Add genre</a>
            </div>
        </div>
    @endforeach
</div>
@endsection
