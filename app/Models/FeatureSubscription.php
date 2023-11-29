<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeatureSubscription extends Model
{
    public $table = 'feature_subscription';

    protected $fillable =  [ 'feature_id', 'subscription_id',];
}
