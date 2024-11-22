<!DOCTYPE html>
<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>{{isset($title) ? $title : "FilmsSite"}}</title>
</head>
<body>
<ul class="nav nav-tabs">
    <li class="nav-item">
        <a class="nav-link" href="/films">Films list</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="/films/create">Add film</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="/genres/">Genres list</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="/genres/create">Add genre</a>
    </li>
</ul>
<div style="display: flex; justify-content: center">
    @yield('content')
</div>

</body>
</html>
