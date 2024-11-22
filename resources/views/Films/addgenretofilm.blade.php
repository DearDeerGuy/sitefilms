@extends('layout')

@section('content')
    <form method="post" action="/films/addgenre">
        @csrf
        <div class="card mb-3" style="width: 18rem;">
            <img src="{{$film->poster}}" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">{{$film->title}}</h5>
            </div>
        </div>
        <input name="film_id" value="{{$film->id}}" hidden>
        <div class="mb-3">
            <select name="genre_id">
                @foreach($genres as $genre)
                    <option value="{{$genre->id}}">{{$genre->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <button class="btn btn-primary">Add</button>
        </div>
    </form>

@endsection
