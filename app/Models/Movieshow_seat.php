<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movieshow_seat extends Model
{
    // use HasFactory;
    protected $fillable=[
        'Movieshow_id',
        'Seat_id'
    
    ];

    //to get the seat in specific movieshow  which a customer reserved
    public function getMycustomer(){
        return $this->belongsToMany('App\Models\Mycustomer','customer_seat_in__movieshows','Movieshow_seat_id','Mycustomer_id');
    }
}
