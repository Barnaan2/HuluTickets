<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cinema extends Model
{
    //  use HasFactory;
      protected $fillable=[
          'Name',
          'Address',
          'Number_Of_Seats',
          'City_id'
      ];
  
      public function getCity(){
          return $this->belongsTo('App\Models\City','City_id');
      }
      // to the movies the cinema  has in the movie show table
      public function getMovieSHow(){
          return $this->hasMany('App\Models\MovieShow','Cinema_id');
      }
  }
  