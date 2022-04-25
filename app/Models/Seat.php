<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seat extends Model
{
   //use HasFactory;
   protected $fillable=[
    'Seat_Number'

];
public function getMovieshow(){
    return $this->belongsToMany('App\Models\Movieshow','movieshow_seats','Seat_id','Movieshow_id');
}
}
