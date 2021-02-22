<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $fillable=['building_id','floor_id','room_id','name','mobile','email','package_id','start_date','next_recurring','connection_status','active_status'];
}
