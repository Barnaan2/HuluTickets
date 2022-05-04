<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InterestedUser extends Model
{
    use HasFactory;
    protected $fillable=[
        'name',
        'email',
        'phone',
        'address',
        'cinema_name',
        'cinema_address',
    ];
}
