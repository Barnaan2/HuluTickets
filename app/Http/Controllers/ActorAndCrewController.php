<?php

namespace App\Http\Controllers;
use App\Models\Crew;
use App\Models\Actor;
use Illuminate\Http\Request;

class ActorAndCrewController extends Controller
{
    //To add actors



 // to add customer to the system;


    // addCrew
    public function addActor(Request $request)
    {

        
        $request->validate([
            'First_Name' => 'required',
            'Last_Name' => 'required',
            'About' => 'required|min:50',
            'file' => 'required|image|mimes:jpeg,png,jpg|max:2048',
          ]);
        //to handle the image of the actors
      $number=SystemController::Count(\App\Models\Actor::all());
     $Picture_Name=request('First_Name') . $number . '.' . 'jpg';
        $Picture_Path=$request->file->storeAs('Actor_Pictures', $Picture_Name, 'public');
        $Picture_link="storage/" . $Picture_Path;
        $actorData = ['First_Name' => $request->First_Name, 'Last_Name' => $request->Last_Name, 'About' => $request->About, 'Picture_Link' =>  $Picture_link];
      
          Actor::create($actorData);
          return redirect('/')->with(['message' => 'Actor added successfully!']);
    }



    public function addCrew(Request $request)
    {
        $request->validate([
            'First_Name' => 'required',
            'Last_Name' => 'required',
            'Role' => 'required',
            'About' => 'required|min:50',
            'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
          ]);
      
        //   $imageName = time() . '.' . $request->file->extension();
           
        //   $request->file->storeAs('public/Crew_Pictures', $imageName);
        $number=SystemController::Count(\App\Models\Crew::all());
        $Picture_Name=request('First_Name') . $number . '.' . 'jpg';
           $Picture_Path=$request->file->storeAs('Crew_Pictures', $Picture_Name, 'public');
           $Picture_link="storage/" . $Picture_Path;
      
          $crewData = ['First_Name' => $request->First_Name, 'Last_Name' => $request->Last_Name, 'About' => $request->About, 'Role' => $request->Role, 'Picture_Link' => $Picture_link];
      
          Crew::create($crewData);
          return redirect('/')->with(['message' => 'Crew added successfully!', 'status' => 'success']);
    }
}
