<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
     //use HasFactory;
     protected $fillable=[
        'Show_Date',
        'Show_Time'
    ];
    public function getMovieShow(){
        return $this->HasOne('App\Models\MovieShow','Schedule_id');
    }
}