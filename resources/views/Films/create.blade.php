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
    <form method="post" style="padding: 20px" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label class="form-label">Title</label>
            <input class="form-control" name="title" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Poster</label>
            <input class="form-control" type="file" name="poster">
        </div>
        <div class="mb-3">
            <button type="submit" class="btn btn-primary">Add</button>
        </div>
    </form>
@endsection
