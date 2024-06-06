<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Route extends Model
{
    public $table = 'routes';

    protected $fillable = ['method', 'url', 'feature',];

}
