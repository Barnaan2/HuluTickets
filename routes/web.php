<?php

use App\Models\Cinema;
use App\Models\Movie;
use App\Models\Movieshow;
 use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/
Route::get('/a/{id}','SystemController@finda')->name('index');
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
Route::post('/login/signUp','Auth\LoginController@login')->name('login.new');

//Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//
//Route::group(['prefix'=>'Admin','middleware'=>['isAdmin','auth','PreventBackHistory']],function(){
//    // you can add route as much as you want here:
//    // all route dedicated to Admin and cinema owner added here
//    Route::get('dashboard',[AdminController::class,'index'])->name('Admin.dashboard');
//});
//
//Route::group(['prefix'=>'CinemaAdmin','middleware'=>['isUser','auth','PreventBackHistory']],function(){
//    // you can add route as much as you want here:
//    // all route dedicated to  cinema owner added here
//    Route::get('dashboard',[UserController::class,'index'])->name('CinemaAdmin.dashboard');
//});










// every Auth concepts
Auth::routes(['register'=>false]);
Route::middleware(['middleware'=>'PreventBackHistory'])->group(function(){
    Auth::routes();
});

// every Auth
Route::group(['middleware'=>'auth'],function(){
 Route::group(['prefix'=>'superAdmin','middleware'=>['isSuperAdmin','PreventBackHistory']],
     function(){
Route::get('/dashboard','AdminController@index')->name('dashboard');
Route::get('/add/Adm','AdminController@register')->name('RegisterMe');
Route::post('/register/Admin','Auth\RegisterController@createAdmin')->name('register.SuperAdmin');

         //All of the SuperAdmin route goes here so put it here

    });



    Route::group(['prefix'=>'Admin','middleware'=>['isAdmin','PreventBackHistory']],
        function(){

            //All of the Admin route goes here so put it here
            Route::get('/Admin','AdminController@Indexs')->name('Admin');
        });



    Route::group(['prefix'=>'CinemaAdmin','middleware'=>['isCinemaAdmin','PreventBackHistory']],
        function(){

            //All of cinema Admin route goes here
//            Route::get('/abc/{id}','SystemController@show');
            Route::get('/Admin/{id}','CinemaAdmin\HomeController@index')->name('Admin');
            Route::get('/Status','CinemaAdmin\HomeController@MovieShowStatus')->name('MovieShowStatus');
            Route::get('/addMovieShow','CinemaAdmin\HomeController@addMovieShow')->name('AddMovieShow');
            Route::get('/selectedStatus/{id}','CinemaAdmin\HomeController@selectedStatus')->name('selectedStatus');
            Route::get('/selected/{id}','CinemaAdmin\HomeController@addSelected')->name('addSelected');
            Route::post('/save/{id}','CinemaAdmin\HomeController@addSelect')->name('addSelect');
            Route::post('/addSold/{id}','CinemaAdmin\HomeController@addSold')->name('addSeat');



            // routes for controlling the account settings
            Route::get('/accountSetting/','CinemaAdmin\AccountController@index')->name('Account');
            Route::post('/sendMessage','CinemaAdmin\AccountController@store')->name('Message');
            Route::post('/profilePicture','CinemaAdmin\AccountController@profile')->name('profilePicture');


    });
});
