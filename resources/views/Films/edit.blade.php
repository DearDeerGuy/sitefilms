@extends('layout')

@section('content')
    <form method="post" action="/films/edit" style="padding: 20px" enctype="multipart/form-data">
        @csrf
        <input name="id" value="{{$film->id}}" hidden>
        <div class="mb-3">
            <label class="form-label">Title</label>
            <input class="form-control" name="title" required value="{{$film->title}}">
        </div>
        <div class="mb-3">
            <label class="form-label">Poster</label>
            <img src="{{$film->poster}}" class="card-img-top" alt="...">
            <input class="form-control" type="file" name="poster" value="{{$film->poster}}">
        </div>
        <div class="mb-3">
            <button type="submit" class="btn btn-primary">Edit</button>
        </div>
    </form>
@endsection
