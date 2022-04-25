<?php

use App\Models\Cinema;
use App\Models\Movie;
use App\Models\Movieshow;
// use App\Http\Controllers\BasicLogics;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/
Route::get('/','MovieShowController@index')->name('index');
Route::get('/test/{id}','MovieShowController@NewOne');
Route::post('/saveChoosed/{id}','MovieShowController@seatController');
Route::post('/newCinema','MovieShowController@addCinema')->name('addCinema');
Route::get('/Check/{id}','MovieShowController@movieDetail')->name('detail');
Route::post('/','MovieController@addMovieTo')->name('addMovieTo');
Route::get('/Book/{id}','MovieShowController@moreDetail')->name('moreDetail');
Route::get('/AddMovie','MovieController@addMovie')->name('addMovie');
Route::post('/AddActor','ActorAndCrewController@addActor')->name('addActor');
Route::post('/add','ActorAndCrewController@addCrew')->name('addCrew');
Route::post('/AddMovieShow','MovieShowController@addMovieShow')->name('addMovieshow');

Route::get('/dashboard', function () {
    $actors = \App\Models\Actor::all();
    $cinemas = \App\Models\Cinema::all();
    $movies = Movie::all();
    $crews =\App\Models\Crew::all();
    $cities =\App\Models\City::all();
    return view('dashboard',compact('actors','movies','cinemas','crews','cities'));
})->name('dashboard');
Route::get('/Admin', function () {
    $cinemas = \App\Models\Cinema::all();
    $movies = Movie::all();
    return view('admin',compact('cinemas','movies'));
})->name('Admin');