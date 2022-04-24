<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie_crew extends Model
{
    protected $fillable = [
        'Crew_id',
        'Movie_id'
    ];
    use HasFactory;
}