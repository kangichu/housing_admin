<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RouteHasFeature extends Model
{
    public $table = 'route_has_features';

    protected $fillable = ['feature_id', 'route_id',];
}
