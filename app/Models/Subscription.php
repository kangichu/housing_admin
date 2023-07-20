<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    protected $fillable = [ 'type', 'description', 'category', 'amount', 'recommended', 'status', 'account_type',];
}
