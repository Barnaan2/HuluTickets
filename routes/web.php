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
//Route::get('/a/{id}','SystemController@finda')->name('index');
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


//Work with us
Route::get('/work_with_us', 'InterestedUserController@storeInterested')->name('StoreInterested');
Route::post('/workwithus', 'InterestedUserController@storeInterestedUser')->name('StoreInterestedUser');
/*
|--------------------------------------------------------------------------------------------------------------------------------
| Auth Routes
|-------------------------------------------------------------------------------------------------------------------------------
*/

Auth::routes(['register'=>false]);
Route::middleware(['middleware'=>'PreventBackHistory'])->group(function(){
    Auth::routes();
});



/*
|--------------------------------------------------------------------------------------------------------------------------------
|All   SuperAdmin, Admin and CinemaAdmin Routes
|-------------------------------------------------------------------------------------------------------------------------------
*/

Route::group(['middleware'=>'auth'],function(){



    /*
    |--------------------------------------------------------------------------------------------------------------------------------
    | Super Admin Routes
    |-------------------------------------------------------------------------------------------------------------------------------
    */

  Route::group(['prefix'=>'superAdmin','middleware'=>['isSuperAdmin','PreventBackHistory']], function(){

         Route::get('/dashboard','AdminController@index')->name('dashboard');
//      Route::get('/add/Adm','AdminController@register')->name('RegisterMe');
      //       Route::post('/register/Admin','Auth\RegisterController@createAdmin');
      Route::get('/','Admin\AdminController@index')->name('RegisterMe');
      Route::get('manage_movies', 'Admin\AdminController@showManageMovie')->name('ShowManageMovies');
      Route::get('/manage_cinemas', 'Admin\AdminController@showManageCinema')->name('ShowManageCinema');
      Route::get('/movieshowstatus', 'Admin\AdminController@showMovieshowstatus')->name('ShowMovieShowStatus');
      Route::get('/Cinemarequest', 'Admin\AdminController@showCinemaRequest')->name('ShowCinemaRequest');
      Route::get('/managed', 'Admin\AdminController@showManagesAdmin')->name('ShowManageAdmin');
//            Route::get('admin/show', 'Admin\AdminController@show')->name('A');

      Route::get('/delete/{id}/{id1}', 'Admin\AdminController@deleteActor')->name('DeleteActorFromMovie');
      Route::get('/deletecrew/{id}/{id1}', 'Admin\AdminController@deleteCrew')->name('DeleteCrewFromMovie');
      Route::get('/delactor/{id}', 'Admin\AdminController@delActor')->name('DeleteActor');
      Route::get('/delcrew/{id}', 'Admin\AdminController@delCrew')->name('DeleteCrew');
      Route::get('/delmovie/{id}', 'Admin\AdminController@delMovie')->name('DeleteMovie');
      Route::get('/delcin_adm/{id}', 'Admin\AdminController@delUser')->name('DeleteUser');
      Route::get('/delcinema/{id}', 'Admin\AdminController@delCinema')->name('DeleteCinema');

      //EDIT ROUTES FOR ADMIN
      Route::get('/manage_movies/{movie}/edit', 'Admin\AdminController@editMovies')->name('EditMovie');
      Route::get('/actors/{actor}/edit', 'Admin\AdminController@editActors')->name('EditActor');
      Route::get('/crews/{crew}/edit', 'Admin\AdminController@editCrews')->name('EditCrew');
      Route::get('/cinemas/{cinema}/edit', 'Admin\AdminController@editCinemas')->name('EditCinema');
      Route::get('/admins/{user}/edit', 'Admin\AdminController@editAdmins')->name('EditAdmin');



      //POST ROUTES FOR ADMIN
      Route::post('/Create/Admin', 'SuperAdmin\SuperAdminController@createAdmin')->name('AddAdmin');




//  PATCH/UPDATE ROUTES FOR ADMIN
      Route::patch('/movies/{movie}', 'Admin\AdminController@updateMovies')->name('UpdateMovie');
      Route::patch('/actors/{actor}', 'Admin\AdminController@updateActors')->name('UpdateActor');
      Route::patch('/crews/{crew}', 'Admin\AdminController@updateCrews')->name('UpdateCrew');
      Route::patch('/cinemas/{cinema}', 'Admin\AdminController@updateCinemas')->name('UpdateCinema');
      Route::patch('/admins/{user}', 'Admin\AdminController@updateAdmins')->name('UpdateAdmin');


  });

    /*
    |--------------------------------------------------------------------------------------------------------------------------------
    | Admin Routes
    |-------------------------------------------------------------------------------------------------------------------------------
    */

    Route::group(['prefix'=>'Admin','middleware'=>['isAdmin','PreventBackHistory']],
        function(){

            //All of the Admin route goes here so put it here
//            Route::get('/Admin','AdminController@Indexs')->name('Admin');
            //SHOW ROUTES FRO ADMIN
            Route::get('/','Admin\AdminController@index')->name('Home');
            Route::get('/admin/manage_movies', 'Admin\AdminController@showManageMovie')->name('ShowManageMovie');
            Route::get('/admin/manage_cinemas', 'Admin\AdminController@showManageCinema')->name('ShowManageCinema');
            Route::get('/admin/movieshowstatus', 'Admin\AdminController@showMovieshowstatus')->name('ShowMovieShowStatus');
            Route::get('/admin/Cinemarequest', 'Admin\AdminController@showCinemaRequest')->name('ShowCinemaRequest');
            Route::get('/admin/managed', 'Admin\AdminController@showManagesAdmin')->name('ShowManageAdmin');
//            Route::get('admin/show', 'Admin\AdminController@show')->name('A');

//DELETE ROUTES FOR ADMIN
            Route::get('/delete/{id}/{id1}', 'Admin\AdminController@deleteActor')->name('DeleteActorFromMovie');
            Route::get('/deletecrew/{id}/{id1}', 'Admin\AdminController@deleteCrew')->name('DeleteCrewFromMovie');
            Route::get('/delactor/{id}', 'Admin\AdminController@delActor')->name('DeleteActor');
            Route::get('/delcrew/{id}', 'Admin\AdminController@delCrew')->name('DeleteCrew');
            Route::get('/delmovie/{id}', 'Admin\AdminController@delMovie')->name('DeleteMovie');
            Route::get('/delcin_adm/{id}', 'Admin\AdminController@delUser')->name('DeleteUser');
            Route::get('/delcinema/{id}', 'Admin\AdminController@delCinema')->name('DeleteCinema');

            //EDIT ROUTES FOR ADMIN
            Route::get('/admin/manage_movies/{movie}/edit', 'Admin\AdminController@editMovies')->name('EditMovie');
            Route::get('/admin/actors/{actor}/edit', 'Admin\AdminController@editActors')->name('EditActor');
            Route::get('/admin/crews/{crew}/edit', 'Admin\AdminController@editCrews')->name('EditCrew');
            Route::get('/admin/cinemas/{cinema}/edit', 'Admin\AdminController@editCinemas')->name('EditCinema');
            Route::get('/admin/admins/{user}/edit', 'Admin\AdminController@editAdmins')->name('EditAdmin');



            //POST ROUTES FOR ADMIN
            Route::post('/admnistrators', 'Admin\AdminController@addAdmnistrators')->name('AddAdmin');




//  PATCH/UPDATE ROUTES FOR ADMIN
            Route::patch('/admin/movies/{movie}', 'Admin\AdminController@updateMovies')->name('UpdateMovie');
            Route::patch('/admin/actors/{actor}', 'Admin\AdminController@updateActors')->name('UpdateActor');
            Route::patch('/admin/crews/{crew}', 'Admin\AdminController@updateCrews')->name('UpdateCrew');
            Route::patch('/admin/cinemas/{cinema}', 'Admin\AdminController@updateCinemas')->name('UpdateCinema');
            Route::patch('/admin/admins/{user}', 'Admin\AdminController@updateAdmins')->name('UpdateAdmin');


        });

    /*
    |--------------------------------------------------------------------------
    | Cinema  Admin Routes
    |--------------------------------------------------------------------------
    */
    Route::group(['prefix'=>'CinemaAdmin','middleware'=>['isCinemaAdmin','PreventBackHistory']],
        function(){

            //Show Routes for CinemaAdmin
            Route::get('/Admin','CinemaAdmin\HomeController@index')->name('Admin');
            Route::get('/Status','CinemaAdmin\HomeController@MovieShowStatus')->name('MovieShowStatus');
            Route::get('/addMovieShow','CinemaAdmin\HomeController@addMovieShow')->name('AddMovieShow');
            Route::get('/selectedStatus/{id}','CinemaAdmin\HomeController@selectedStatus')->name('selectedStatus');
            Route::get('/selected/{id}','CinemaAdmin\HomeController@addSelected')->name('addSelected');
            Route::get('/accountSetting/','CinemaAdmin\AccountController@index')->name('Account');

        //Post Routes for Cinema Admin
            Route::post('/save/{id}','CinemaAdmin\HomeController@addSelect')->name('addSelect');
            Route::post('/addSold/{id}','CinemaAdmin\HomeController@addSold')->name('addSeat');
            Route::post('/sendMessage','CinemaAdmin\AccountController@store')->name('Message');
            Route::post('/profilePicture','CinemaAdmin\AccountController@profile')->name('profilePicture');


    });
});





















// useless routes
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
