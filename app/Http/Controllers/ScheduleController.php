<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    //
    //To show more detail for Booking
    public function moreDetail($id)
    {
        $movie=\App\Models\Movie::find($id);// movie id

        $movieshow=$movie->getMovieshow;

        return view('movieShow', compact('movieshow', 'movie'));
    }
}
