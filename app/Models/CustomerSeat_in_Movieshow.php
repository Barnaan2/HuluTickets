<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerSeat_in_Movieshow extends Model
{
    // use HasFactory;
    protected $fillable = [
        'Mycustomer_id',
        'Movieshow_seat_id'
       
    ];
}
