<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CollectedBills extends Model
{
    use HasFactory;
    protected $fillable=['available_balance'];
}
