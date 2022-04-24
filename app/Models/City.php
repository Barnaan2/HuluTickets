<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;
    protected $fillable =[
        'Name'
    ];
    // to find all cinemas found in specific city
    public function getCinema(){
        return $this->hasMany('App\Models\Cinema','City_id');
    }
}
