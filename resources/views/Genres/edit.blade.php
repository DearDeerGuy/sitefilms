@extends('layout')

@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form method="post" action="/genres/edit" style="padding: 20px">
        @csrf
        <input name="id" value="{{$genre->id}}" hidden>
        <div class="mb-3">
            <label class="form-label">Genre name</label>
            <input class="form-control" name="name" required value="{{$genre->name}}">
        </div>
        <div class="mb-3">
            <button type="submit" class="btn btn-primary">Edit</button>
        </div>
    </form>
@endsection
