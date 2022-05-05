<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ActorController extends Controller
{
    public  function addActor()
     {
         //to handle the image of the actors
         $number=SystemController::Count(\App\Models\Actor::all());
         $Picture_Name=request('First_Name') . $number . '.' . 'jpg';
         $Picture_Path=request('Actor_Picture')->storeAs('Actor_Pictures', $Picture_Name, 'public');
         $Picture_link="storage/" . $Picture_Path;

    //save the actor to the data base
         $newActor=\App\Models\Actor::create([
             'First_Name'=>request('First_Name'),
             'Last_Name'=>request('Last_Name'),
             'About'=>request('About'),
             'Picture_Link'=>$Picture_link
         ]);
         $newActor->save();
         if(Auth::user()->role==1) {
             return redirect()->route('RegisterMe')->with('alert', 'You have added new Actor');

         }
         return redirect()->route('Home')->with('alert','You have added a new Actor');
     }
}
