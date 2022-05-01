<?php
use App\Http\Controllers;
use App\Models\Cinema;
use App\Models\Movie;
use App\Models\Movieshow;
use App\Http\Controllers\MovieShowController;
 use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ActorAndCrewController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ActorController;
use App\Http\Controllers\CrewController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/
Route::get('/actor','ActorController@index')->name('actor.index');
Route::get('/actor/create','ActorController@create')->name('actor.create');
Route::post('/actor','ActorController@store')->name('actor.store');
Route::get('/actor/{id}','ActorController@show')->name('actor.show');
Route::get('/actor/{id}/edit','ActorController@edit')->name('actor.edit');
Route::PATCH('/actor/{id}','ActorController@update')->name('actor.update');
Route::delete('/actor/{id}','ActorController@destroy')->name('actor.destroy');

Route::get('/crew','CrewController@index')->name('crew.index');
Route::get('/crew/create','CrewController@create')->name('crew.create');
Route::post('/crew','CrewController@store')->name('crew.store');
Route::get('/crew/{id}','CrewController@show')->name('crew.show');
Route::get('/crew/{id}/edit','CrewController@edit')->name('crew.edit');
Route::PATCH('/crew/{id}','CrewController@update')->name('crew.update');
Route::delete('/crew/{id}','CrewController@destroy')->name('crew.destroy');
// Route::resource('actor',ActorController::class);


Route::get('/','MovieShowController@index')->name('index');
Route::get('/test/{id}','SeatController@NewOne');
Route::get('/cinema/{id}','MovieShowController@CinemaMovie');
Route::post('/saveChoosed/{id}','SeatController@seatController');
Route::post('/newCinema','CinemaController@addCinema')->name('addCinema');
Route::get('/Check/{id}','MovieController@movieDetail')->name('detail');
Route::post('/','MovieController@addMovieTo')->name('addMovieTo');
Route::get('/Book/{id}','ScheduleController@moreDetail')->name('moreDetail');
Route::get('/AddMovie','MovieController@addMovie')->name('addMovie');
Route::post('/AddActor','ActorController@addActor')->name('addActor');
Route::post('/addCrew','CrewController@addCrew')->name('addCrew');
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


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix'=>'admin','middleware'=>['isAdmin','auth','PreventBackHistory']],function(){
    // you can add route as much as you want here:
    // all route dedicated to admin and cinema owner added here
    Route::get('dashboard',[AdminController::class,'index'])->name('admin.dashboard');
});

Route::group(['prefix'=>'user','middleware'=>['isUser','auth','PreventBackHistory']],function(){
    // you can add route as much as you want here:
    // all route dedicated to  cinema owner added here
    Route::get('dashboard',[UserController::class,'index'])->name('user.dashboard');
});
