<?php

namespace App\Http\Controllers;

use App\Models\Cinema;
use App\Models\Movie;
use App\Models\MovieShow;
use Illuminate\Http\Request;

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
    public function movieDetail($id)
    {
        $movie=\App\Models\Movie::find($id);
     $actors = $movie->getActor;
    $crews = $movie->getCrew;
        return view('/Check', compact('movie','actors','crews'));
    }


    //To show more detail for Booking
   public function moreDetail($id)
   {
       $movie=\App\Models\Movie::find($id);// movie id

       $movieshow=$movie->getMovieshow;

       return view('movieShow', compact('movieshow', 'movie'));
   }
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
   public function addCinema(){
        $cinema = Cinema::create([
            'Name' => request('Name'),
            'Address'=> request('Address'),
            'Number_Of_Seats' => request('Number_Of_Seat'),
            'City_id'=>request('City_id')
        ]);
        $cinema->save();
        return redirect('dashboard');
   }
}
