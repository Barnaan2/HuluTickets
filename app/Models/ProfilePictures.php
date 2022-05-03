<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfilePictures extends Model
{
    use HasFactory;
    protected $fillable =[
        'User_id',
        'Picture_Link'
    ];
}
