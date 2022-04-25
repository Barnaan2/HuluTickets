<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MyCustomer extends Model
{
    // use HasFactory;
    protected $fillable =[
        'Name',
        'Email_Address'
    ];


    // to find the seat a customer chooses from movieshow seat
    public function getMoiveshow_seat(){
        return $this->belongsToMany('App\Models\Movieshow_seat','customer_seat_in__movieshows','Mycustomer_id','Movieshow_seat_id');
    }
}
