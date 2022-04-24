<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MovieActor extends Model
{
  
   // use HasFactory;
   protected $fillable =[
    'Movie_id',
    'Actor_id'
];
}