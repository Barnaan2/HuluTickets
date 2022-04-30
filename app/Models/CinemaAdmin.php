<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CinemaAdmin extends Model
{
    use HasFactory;
    protected $fillable=[
        'User_id',
        'Cinema_id'
    ];
}
