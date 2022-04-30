<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;
class MovieShow extends Model
{ // use HasFactory;
    use SoftDeletes;
    // may be the sold tickets do not gonna appear when the cinema Admin adds movies
    // but latter when they sell the tickets so i think it must be
    protected $fillable = [
        'Movie_id',
        'Cinema_id',
        'Schedule_id',
       'Sold_Ticket',
        'Price'
    ];
    protected $dates = ['deleted_at'];
    // to find all Customer booked for a movie show
    public function getCustomer(){
        return $this->belongsToMany('App\Models\Customer','movieshow_customers','Movieshow_id','Customer_id');
    }
    // schedules of movie show
    public function getSchedule(){
        return $this->belongsTo('App\Models\Schedule','Schedule_id');
    }

// the foreign key part is may not correct
 public function getMovie(){
        return $this->belongsTo('App\Models\Movie','Movie_id');
 }


 public function getCinema(){
        return $this->belongsTo('App\Models\Cinema','Cinema_id');
 }
 public function getSeatNumber(){
    return $this->belongsToMany('App\Models\Seat','movieshow_seats','Movieshow_id','Seat_id');
}
}
