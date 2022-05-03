<?php

namespace App\Http\Controllers\CinemaAdmin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\SystemController;
use App\Models\CustomerSeat_in_Movieshow;
use App\Models\Movie;
use App\Models\MovieShow;
use App\Models\Movieshow_seat;
use App\Models\ProfilePictures;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    // index page
    public function index($id)
    {
        $user = \App\Models\User::find($id);
        $Cinemas = $user->getCinema;
$profile = ProfilePictures::firstWhere('User_id',Auth::user()->id)->Picture_Link;
        foreach ($Cinemas as $cinema) {
            $Cinema = $cinema;
        }
        $movieShows = $Cinema->getMovieshow;

        return view('dashboard.CinemaAdmin.index', compact('Cinema', 'movieShows','profile'));
    }

    public function addMovieShow()
    {
        $Cinemas = Auth::user()->getCinema;
        foreach ($Cinemas as $cinema) {
            $Cinema = $cinema;
        }
        $profile = ProfilePictures::firstWhere('User_id',Auth::user()->id)->Picture_Link;
        $movies = Movie::all()->sortBy('created_at');

        return view('dashboard.CinemaAdmin.addMovieShow', compact('movies', 'Cinema','profile'));

    }

    public function movieShowStatus()
    {
        $profile = ProfilePictures::firstWhere('User_id',Auth::user()->id)->Picture_Link;
        $user = Auth::user()->getCinema;
        foreach ($user as $cinema) {
            $Cinema = $cinema;
        }
        // later this will be the active one
        $Active = count($Cinema->getMovieshow);


        //here there will be active with trashed in the;
        $Total = $Active;
        return view('dashboard.CinemaAdmin.MovieShowStatus', compact('Cinema', 'Total', 'Active','profile'));
    }


    public function selectedStatus($id)
    {
        $profile = ProfilePictures::firstWhere('User_id',Auth::user()->id)->Picture_Link;
        $user = Auth::user()->getCinema;

        foreach ($user as $cinema) {
            $Cinema = $cinema;
        }
        $MovieShow = MovieShow::find($id);

        $numberOfSeats = \App\Models\Movieshow::find($id)->getCinema->Number_Of_Seats;
        $MS_id = $id;
        $arrayOfSeats = SystemController::AssignSeat($numberOfSeats, $MS_id);
        $allSeats = SystemController::allseats($numberOfSeats);
        $huluSeats = SystemController::show($id);
//    return view('Chooseseat',[
//        'huluSeats'=>$huluSeats,
//        'MS_id' => $MS_id,
//        'allSeats'=> $allSeats,
//        'arrayOfSeats'=> $arrayOfSeats]);
// $huluSeats = CustomerSeat_in_Movieshow::firstwhere('Movieshow_seat_id',538)->Movieshow_seat_id;
//return $huluSeats;

        return view('dashboard.CinemaAdmin.selectedStatus', compact('huluSeats','profile', 'allSeats', 'arrayOfSeats', 'id', 'MovieShow', 'Cinema'));
    }

// to accept the  get request of adding new movie show
    public function addSelected($id)
    {
        $profile = ProfilePictures::firstWhere('User_id',Auth::user()->id)->Picture_Link;

        $user = Auth::user()->getCinema;

        foreach ($user as $cinema) {
            $Cinema = $cinema;

        }
        $Movie = Movie::find($id);


        return view('dashboard.CinemaAdmin.addSelected', compact('id','profile', 'Cinema', 'Movie'));
    }


//to add the movie to movies how of the cinema('accept post request')
    public function addSelect(Request $request, $id)
    {
        $input = $request->all();
        $this->validate($request, [
            'Show_time' => 'required',
            'Show_date' => 'required',
            'Price' => 'required'
        ]);
        // to get the cinema under the authenticated user

        $user = Auth::user()->getCinema;
        foreach ($user as $cinema) {
            $Cinema = $cinema;
        }
        $Cinema_id = $Cinema->id;
        $date = $request->Show_date;
        $time = $request->Show_time;
        $Schedule_id = SystemController::schedule($date, $time);
        $newmovieshow = Movieshow::create([
            'Movie_id' => $id,
            'Cinema_id' => $Cinema_id,
            'Schedule_id' => $Schedule_id,
            'Price' => $request->Price
        ]);
        $newmovieshow->save();
        return redirect()->route('Admin', Auth::user()->id)->with('alert', 'you Have successfully added a new movie to Show');
    }

// adding the sold ticket by the cinema owner
    public function addSold($id)
    {

        $choosed = request('ChoosedSeats');
        $abc="";
        foreach ($choosed as $seat) {
            $abc .= $seat ." ";
            $seat_in = Movieshow_seat::create([
                'Movieshow_id' => $id,
                'Seat_id' => $seat

            ]);
            $seat_in->save();
        }
            return redirect()->route('selectedStatus', $id)->with('alert', "you have successfully reserved seat Number $abc ");

    }
}
