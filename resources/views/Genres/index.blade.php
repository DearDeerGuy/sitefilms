@extends('layout')

@section('content')
    <div style="display: flex; flex-wrap: wrap; justify-content: space-around; position: absolute; align-content: space-around; height: 100%">
        @foreach($genres as $genre)
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">{{$genre->name}}</h5>
                </div>
                <div class="card-body">
                    <a href="/genres/{{$genre->id}}/edit" class="card-link">Edit</a>
                    <a href="/genres/{{$genre->id}}/delete" class="card-link">Delete</a>
                </div>
            </div>
        @endforeach
    </div>
@endsection
