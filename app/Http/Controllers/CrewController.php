<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CrewController extends Controller
{
    //
    // addCrew
    public  function addCrew()
    {
        //to handle the image of the actors
        $number=SystemController::Count(\App\Models\Crew::all());
        $Picture_Name=request('First_Name') . $number . '.' . 'jpg';
        $Picture_Path=request('Crew_Picture')->storeAs('Crew_Pictures', $Picture_Name, 'public');
        $Picture_link="storage/" . $Picture_Path;


        $newActor=\App\Models\Crew::create([
            'First_Name'=>request('First_Name'),
            'Last_Name'=>request('Last_Name'),
            'About'=>request('About'),
            'Role' => request('Role'),
            'Picture_Link'=>$Picture_link
        ]);
        $newActor->save();
        if(Auth::user()->role==1) {
            return redirect()->route('ShowManageMovies')->with('alert', 'You have added new Crew');


        }
        return redirect()->route('ShowManageMovie')->with('alert','You have added a new Crew');
    }


}
