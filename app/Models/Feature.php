<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feature extends Model
{
    protected $table = 'subscription_features';

    protected $fillable = ['feature', 'feature_permission', 'description',];
}
