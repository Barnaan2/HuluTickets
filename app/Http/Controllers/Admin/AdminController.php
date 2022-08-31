<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Cinema;
use App\Models\CinemaAdmin;
use App\Models\InterestedUser;
use App\Models\Message;
use App\Models\Movie;
use App\Models\Actor;
use App\Models\City;
use App\Models\Crew;
use App\Models\MovieShow;
use App\Models\ProfilePictures;
use App\Models\User;
use App\Models\MovieActor;
use App\Models\interested_user;
use App\Models\Movie_crew;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    // Home Function for Admin
    public function index()
    {
        $ActiveMovieShow = count(MovieShow::all());

        $cinemas=Cinema::all();
  return view('Dashboard.Admin.home', compact('cinemas','ActiveMovieShow'));
    }



  //CREATE FUNCTIONS FOR ADMIN
    public function addAdmnistrators(Request $admin){

//        $admin= request()->validate([
//            'Name'=>['required'],
//            'Address'=>['required'],
//            'Number_Of_Seats' => ['required'],
//            'City_id'=> ['required'],
//            'name'=> ['required'],
//            'email'=> ['required', 'string', 'email', 'max:255'],
//            'password'=> ['required'],
//        ]);
//        return "hello";
//  dd($admin->all());
        $cinema = Cinema::create([
            'Name' =>  $admin->Name,
            'Address'=>  $admin->Address,
            'Number_Of_Seats' =>  $admin->Number_Of_Seat,
            'City_id'=> $admin->City_id
        ]);
        $cinema->save();





        $role = 3;
        $user = User::create([
            'name'=>  $admin->name,
            'email'=>  $admin->email,
            'role'=> $role,
            'password'=>  Hash::make($admin->password),
        ]);
        $user->save();




        $User_id =User::latest('created_at')->first()->id;
        $Cinema_id =Cinema::latest('created_at')->first()->id;
        $CinemaAdmin = CinemaAdmin::create([
            'Cinema_id' => $Cinema_id,
            'User_id' =>$User_id
        ]);
        $CinemaAdmin->save();
        $Picture_Link = 'sdflsdf';
        $change = ProfilePictures::create([
            'User_id' => $User_id,
            'Picture_Link'=> $Picture_Link
        ]);
        $change->save();
        return redirect()->route('Home')->with('alert','You have sucessfully added new cinema and its Admin');
    }


    //for checking
    public function createAdmin(Request $request)
    {
        $input = $request->all();
        $this->validate($request,[
            'email'=>'required|email',
            'password'=>'required',
            'name'=>'required'
        ]);

        $role = 2;
        $Admin = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $role,
            'password' => Hash::make($request->password)
        ]);
        $Admin->save();
        return redirect()->route('Home')->with('Admin', 'You have added new Admin');


    }



//UPDATE FUNCTIONS FOR ADMIN
public function updateMovies(Movie $movie){
     $edited=request()->validate([
        'Title'=>'required',
        'Description'=>'required',
        'Poster_Link'=>'required',
        'Release_Date'=>'required',
        'Tailer _Link'=>'url',
     ]);


     $values =request('Actor_id');
     foreach ($values as $value){
        $relations = \App\Models\MovieActor::create(
         [
             'Movie_id' =>$movie->id,
             'Actor_id'=>$value
         ]);
         $relations->save();

     }
     $Crews =request('Crew_id');
     foreach ($Crews as $crew){
         $relations = \App\Models\Movie_crew::create(
             [
                 'Movie_id' =>  $movie->id,
                 'Crew_id'=> $crew
             ]);
         $relations->save();

     }




if (request('Poster_Link')){

  $Poster_Path=request('Poster_Link')->store('storage/Movie_Posters', 'public');
  $Poster_Link="storage/" . $Poster_Path;

}




    $movie->update(array_merge(
       $edited,

       ['Poster_Link'=>$Poster_Link]
     ));
if(Auth::user()->role == 1){
    return redirect()->route('ShowManageMovies')->with('alert','you have updated movies successfully');
}

     return redirect()->route('ShowManageMovie')->with('alert','you have updated movies successfully');

    }






//update actors
public function updateActors(Actor $actor){
    $edited=request()->validate([
       'First_Name'=>'required',
       'Last_Name'=>'required',
       'About'=>'required',
       'Picture_Link'=>'required',

    ]);
if (request('Picture_Link')){

 $Poster_Path=request('Picture_Link')->store('storage/Actor_Pictures', 'public');
 $Picture_Link="storage/" . $Poster_Path;

}

   $actor->update(array_merge(
      $edited,
      ['Picture_Link'=>$Picture_Link]
    ));

    if(Auth::user()->role == 1) {
        return redirect()->route('ShowManageMovies');
    }
    return redirect()->route('ShowManageMovie');

  }


  public function updateCrews(Crew $crew){
    $edited=request()->validate([
       'First_Name'=>'required',
       'Last_Name'=>'required',
       'About'=>'required',
       'Picture_Link'=>'required',
       'Role'=>'required',

    ]);
if (request('Picture_Link')){

 $Poster_Path=request('Picture_Link')->store('storage/Crew_Pictures', 'public');
 $Picture_Link="storage/" . $Poster_Path;

}

   $crew->update(array_merge(
      $edited,
      ['Picture_Link'=>$Picture_Link]
    ));
      if(Auth::user()->role == 1) {
          return redirect()->route('ShowManageMovies');
      }
      return redirect()->route('ShowManageMovie');
  }


public function updateCinemas(Cinema $cinema){
    $edited=request()->validate([
       'Name'=>'required',
       'Address'=>'required',
       'ProfilePicture'=>'required',
       'Number_Of_Seats'=>'required',

    ]);
if (request('ProfilePicture')){

 $Poster_Path=request('ProfilePicture')->store('storage/Cinema_Pictures', 'public');
 $ProfilePicture="storage/" . $Poster_Path;

}

   $cinema->update(array_merge(
      $edited,
      ['ProfilePicture'=>$ProfilePicture]
    ));
    if(Auth::user()->role == 1) {
        return redirect()->route('ShowManageCinemas');
    }
    return redirect()->route('ShowManageCinema');
  }





//Admin updates
  public function updateAdmins(User $user){
    $edited=request()->validate([
       'name'=>'required',
       'username'=>'required',
       'email'=>'required',
    ]);
   $user->update($edited);

    return redirect()->route('ShowManageAdmins');
  }



// EDIT FUNCTIONS FOR ADMIN
public function editMovies(Movie $movie){
  // dd($movie);
  $actors=Actor::all();
  $crews=Crew::all();
  $actorss=$movie->getActor;
  $crewss=$movie->getCrew;
return view('dashboard.Admin.movies.edit', compact('movie', 'crews', 'actors', 'actorss', 'crewss'));
}





   public function editActors(Actor $actor){
    return view('dashboard.Admin.actors.edit', compact('actor'));
   }


   public function editCrews(Crew $crew){

    return view('dashboard.Admin.crews.edit', compact('crew'));
   }

   public function editCinemas(Cinema $cinema){
   $cities=City::all();
    $citiess=$cinema->getCity();
       if(Auth::user()->role == 1) {
      return view('dashboard.Admin.cinemas.edit', compact('cinema', 'cities', 'citiess'));
//           return redirect()->route('EditCinemas', compact('cinema', 'cities'));
       }
    return view('dashboard.Admin.cinemas.edit', compact('cinema', 'cities', 'citiess'));
//       return redirect()->route('EditCinema', compact('cinema', 'cities'));
   }

   public function editAdmins(User $user){

     return view('dashboard.Admin.edit', compact('user'));
    }



//SHOW FUNCTIONS FOR ADMIN
public function showManageMovie(){

  $movies=Movie::all();
  $actors =Actor::all();
  $crews=Crew::all();

  return view('dashboard.Admin.manage_movies', compact('movies'), compact('actors', 'crews'));
}
public function showManageCinema(){
  $cities=City::all();
  $cinemas = Cinema::all();
  $users=User::all();
  $userscinema=User::where('role', 3)->get();
  return view('dashboard.Admin.manage_cinemas', compact('cities', 'cinemas', 'users', 'userscinema'));
}
public function showMovieshowstatus(){
  return view('dashboard.Admin.movieshowstatus');
}
public function showCinemaRequest(){
        $messages = Message::all();
  $interested_users=InterestedUser::all();

  return view('dashboard.Admin.Cinemarequest', compact('interested_users','messages'));
}
public function showManagesAdmin(){
$users=User::all();
if(Auth::user()->role ==1){
    return view('dashboard.SuperAdmin.managed', compact('users'));

}
  return view('dashboard.Admin.managed', compact('users'));
}


//DELETE FUNCTIONS FOR ADMIN
public function deleteActor($id,$id1){
$name = Actor::find($id)->First_Name;

$actor = MovieActor::firstwhere([
  'Actor_id'=>$id,
  'Movie_id'=>$id1,

]);

  $actor->delete();

    if(Auth::user()->role == 1) {
        return redirect()->route('EditMovies',$id1)->with('alert','You have deleted Actor  '.$name." from this movie");
    }
    return redirect()->route('EditMovie',$id1)->with('alert','You have deleted Actor '.$name." from this movie");;
}

public function deleteCrew($id, $id1){
    $name = Crew::find($id)->First_Name;
  $crew = Movie_crew::firstwhere([
    'Crew_id'=>$id,
    'Movie_id'=>$id1,
  ]);
    $crew->delete();
    if(Auth::user()->role == 1) {
        return redirect()->route('EditMovies',$id1)->with('alert','You have deleted Crew '.$name." from this movie");
    }
    return redirect()->route('EditMovie',$id1)->with('alert','You have deleted  Crew '.$name." from this movie");
}

public function delActor($id){
$actor=Actor::find($id);
$actor->delete();
    if(Auth::user()->role == 1) {
        return redirect()->route('ShowManageMovies');
    }
    return redirect()->route('ShowManageMovie');
}

public function delCrew($id){
  $crew=Crew::find($id);
  $crew->delete();
    if(Auth::user()->role == 1) {
        return redirect()->route('ShowManageMovies');
    }
    return redirect()->route('ShowManageMovie');
  }

  public function delMovie($id){
    $movie=Movie::find($id);
    $movie->delete();
      if(Auth::user()->role == 1) {
          return redirect()->route('ShowManageMovies');
      }
      return redirect()->route('ShowManageMovie');
    }



    // cinema admin
public function delUser($id){
    $user=User::find($id);
    $user->delete();
    if(Auth::user()->role == 1) {
        return redirect()->route('ShowManageAdmins')->with('alert','You have deleted System admin Successfully');
    }
    return redirect()->back();

    }




public function delCinema($id){
    $cinema=Cinema::find($id);

      $cinema->delete();
    if(Auth::user()->role == 1) {
        return redirect()->route('ShowManageCinemas')->with('alert', 'You have successfully deleted the selected cinema ');
    }
    return redirect()->route('ShowManageCinema')->with('alert', 'You have successfully deleted the selected cinema ');
    }

}
