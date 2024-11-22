<?php

use App\Http\Controllers\FilmController;
use App\Http\Controllers\FilmsAPIController;
use App\Http\Controllers\GenreController;
use Illuminate\Support\Facades\Route;

Route::prefix('films')->group(function () {
    Route::get('/', [FilmController::class, 'index'])->name('films.index');
    Route::get('/create', [FilmController::class, 'create'])->name('films.create');
    Route::post('/create', [FilmController::class, 'store'])->name('films.store');
    Route::get('/{id}/edit', [FilmController::class, 'edit'])->where('id', '[0-9]+')->name('films.edit');
    Route::post('/edit', [FilmController::class, 'update'])->name('films.update');
    Route::get('/{id}/delete', [FilmController::class, 'destroy'])->where('id', '[0-9]+')->name('films.delete');
    Route::get('/{id}/complete', [FilmController::class, 'complete'])->where('id', '[0-9]+')->name('films.complete');
    Route::get('/{id}/addgenre', [FilmController::class, 'addgenre'])->where('id', '[0-9]+')->name('films.addgenre');
    Route::post('/addgenre', [FilmController::class, 'addgenretofilm'])->name('films.addgenretofilm');
});
Route::prefix('genres')->group(function () {
    Route::get('/', [GenreController::class, 'index'])->name('genres.index');
    Route::get('/create', [GenreController::class, 'create'])->name('genres.create');
    Route::post('/create', [GenreController::class, 'store'])->name('genres.store');
    Route::get('/{id}/edit', [GenreController::class, 'edit'])->where('id', '[0-9]+')->name('genres.edit');
    Route::post('/edit', [GenreController::class, 'update'])->name('genres.update');
    Route::get('/{id}/delete', [GenreController::class, 'destroy'])->where('id', '[0-9]+')->name('genres.delete');
});
Route::prefix('api')->group(function () {
    Route::get('/genres', [FilmsAPIController::class, 'getGenres']);
    Route::get('/genres/{id}', [FilmsAPIController::class, 'getFilms'])->where('id', '[0-9]+');
    Route::get('/films', [FilmsAPIController::class, 'getFilmsList']);
    Route::get('/films/{id}', [FilmsAPIController::class, 'getFilm'])->where('id', '[0-9]+');
});
