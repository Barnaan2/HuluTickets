<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    // use HasFactory;
     //cupon number is not relevant for customer table
     protected $fillable=[
         'First_Name',
         'Last_Name',
         'Coupon_Number',
         'Number_Of_Ticket',
         'Phone_Number'
 
     ];
 
     //To get Movie Show Customer Booked for
     public function getMovieShow(){
         return $this->belongsToMany('App\Models\MovieShow','movieshow_customers','Customer_id','Movieshow_id');
     }
 
 }
 