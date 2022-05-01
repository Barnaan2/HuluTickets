<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
 
class Actor extends Model
{
    use HasFactory; protected $fillable = [
        'First_Name',
        'Last_Name',
        'About',
        'Picture_Link'
    ];
    public function getMovie(){
        return $this->belongsToMany('App\Models\Movie','movie_actors','Actor_id','Movie_id');
    }
}
