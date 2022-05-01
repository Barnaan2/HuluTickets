<?php

namespace App\Http\Controllers;

use App\Models\Cinema;
use Illuminate\Http\Request;

class CinemaController extends Controller
{
    //
    public function addCinema(){

        $cinema = Cinema::create([
            'Name' => request('Name'),
            'Address'=> request('Address'),
            'Number_Of_Seats' => request('Number_Of_Seat'),
            'City_id'=>request('City_id')
        ]);
        $cinema->save();
        return redirect('/');
    }
}
