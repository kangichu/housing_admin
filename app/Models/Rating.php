<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    public $table = 'ratings';

    protected $fillable =  [ 'business_id', 'rating', 'review', 'identifier', 'user_id', 'status', ];
}
