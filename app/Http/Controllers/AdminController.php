<?php


namespace App\Http\Controllers;


use App\Models\Movie;

class AdminController
{
    function index()
    {
        // the system controller Admin goes to this view
        $actors = \App\Models\Actor::all();
        $cinemas = \App\Models\Cinema::all();
        $movies = Movie::all();
        $crews = \App\Models\Crew::all();
        $cities = \App\Models\City::all();
        return view('dashboard', compact('actors', 'movies', 'cinemas', 'crews', 'cities'));
    }

   public function indexs()
    {
        $cinemas = \App\Models\Cinema::all();
        $movies = Movie::all();
 return view('Admin',compact('cinemas'));
    }

    public function register(){
        return view('dashboard.SuperAdmin.superAdmin');
    }

}


