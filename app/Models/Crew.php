<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Crew extends Model
{
    protected $fillable = [
        'First_Name',
        'Last_Name',
        'About',
        'Role',
        'Picture_Link'
    ];
    //use HasFactory;
    public function getMovie(){
        return $this->belongsToMany('App\Models\Movie','movies_crews','Crew_id','Movie_id');
    }
}