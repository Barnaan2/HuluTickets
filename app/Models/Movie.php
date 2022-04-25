<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;
    protected $fillable=[
        'Title',
        'Description',
        'Poster_Link',
        'Release_Date',
        'Tailer_Link'
    ];
    // method to get actors worked on movie
    public function getActor(){
        return $this->belongsToMany('App\Models\Actor','movie_actors','Movie_id','Actor_id');
    }

    //may be this is the most useful method, to get movie show based on movie id
    public function getMovieShow(){
      return $this->hasMany('App\Models\MovieShow','Movie_id') ;
    }
    public function getCrew(){
        return $this->belongsToMany('App\Models\Crew','movie_crews','Movie_id','Crew_id');
    }
}