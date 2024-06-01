<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
    use HasFactory;
    protected $table = 'drivers';
    // In your Event model
    protected $fillable = ['tittle', 'fromcity', 'tocity', 'atime', 'dtime', 'total_seats', 'eimage', 'detail', 'driver_id', 'status'];

}
