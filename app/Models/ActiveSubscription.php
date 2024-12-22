<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActiveSubscription extends Model
{
    public $table = 'active_subscriptions';

    protected $fillable = [
        'subscription_id',  'start_date',  'end_date',  'duration',  'footer',  'status',  'reference_id',  'user_id',  'added_by', 'expiry_date_time', 'notification_sent',
    ];
}
