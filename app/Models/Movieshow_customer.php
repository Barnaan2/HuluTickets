<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movieshow_customer extends Model
{
  //    use HasFactory;
  protected $fillable = [
    'Movieshow_id',
     'Customer_id'
];
}
