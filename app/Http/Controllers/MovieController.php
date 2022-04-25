<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;

class MovieController extends Controller
{
// add movie page
public function addMovie(){
    $actors = \App\Models\Actor::all();
    $cinemas = \App\Models\Cinema::all();
    $movies = Movie::all();
    $crews =\App\Models\Crew::all();

    return view('AddMovie',compact('actors','movies','cinemas','crews'));
}

// TO add movie the movie table
public function addMovieTo()
{
    //i have to validate the input and check if the picture is set?
      $number=SystemController::Count(Movie::all());
    $Poster_Name=request('Title') . $number . '.' . 'jpg';
    $Poster_Path=request('Poster')->storeAs('Movie_Posters', $Poster_Name, 'public');
    $Poster_Link="storage/" . $Poster_Path;
    $NewMovie=Movie::create(
        [
            'Title'=>request('Title'),
            'Description'=>request('Description'),
            'Poster_Link'=>$Poster_Link,
            'Release_Date'=>request('Release_Date'),
            'Tailer_Link'=>request('Tailer_Link')
        ]);
    $NewMovie->save();
    $mv_id = $number+1;
    $values =request('Actor_id');
    foreach ($values as $value){
       $relations = \App\Models\MovieActor::create(
        [
            'Movie_id' =>$mv_id ,
            'Actor_id'=>$value
        ]);
        $relations->save();

    }
    $Crews =request('Crew_id');
    foreach ($Crews as $crew){
        $relations = \App\Models\Movie_crew::create(
            [
                'Movie_id' =>  $mv_id,
                'Crew_id'=> $crew
            ]);
        $relations->save();

    }

    return redirect('/');
}


}
