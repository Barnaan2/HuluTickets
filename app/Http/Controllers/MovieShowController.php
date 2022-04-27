<?php

namespace App\Http\Controllers;

use App\Models\Cinema;
use App\Models\Movie;
use App\Models\Seat;
use App\Models\MyCustomer;
use App\Models\MovieShow;
use App\Models\Movieshow_seat;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class MovieShowController extends Controller
{
   // Entry point or Index
    public function index(){
        $movie = SystemController::summer(Movie::latest()->paginate(3));
        $cinemas = Cinema::all();
        $newrelease = Movie::latest()->paginate(6);
        return view('welcome', compact('movie','newrelease','cinemas'));
    }

    // TO view the detail of the movie



   // TO add new MovieShow
   public function addMovieShow ()
   {
       $date=request('Show_date');
       $time=request('Show_time');
       $Schedule_id = SystemController::schedule($date, $time);
       $newmovieshow = Movieshow::create([
           'Movie_id'=>request('Movie_id'),
           'Cinema_id'=>request('Cinema_id'),
           'Schedule_id'=>$Schedule_id,
           'Sold_Ticket'=>request('Sold_Ticket'),
           'Price'=>request('Price')
       ]);
       $newmovieshow->save();
       return redirect('Admin')->with('alert','you Have successfully added a new movie to Show');
   }




// The customer view
public function CinemaMovie($id){
        $cinema = Cinema::find($id);
        $movieshow = $cinema->getMovieshow;
$cinemaName = $cinema->Name;
        return view('cinema_movieshow',compact('movieshow','cinemaName'));
}
// to register new cinema admin
//
//public function cinemaAdmin()
//{
//    protected function create(array $data)
//    {
//        return User::create([
//            'name' => $data['name'],
//            'email' => $data['email'],
//            'password' => Hash::make($data['password']),
//        ]);
//    }
//

}
