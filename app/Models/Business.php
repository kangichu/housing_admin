<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Business extends Model
{
   /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'businesses';

    protected $fillable = [
        'account_type', 'business_name', 'business_description', 'business_site', 
        'business_email', 'user_id', 'registration_number', 'date_of_incorporation', 'is_verified', 'verified_at'
    ];

    public function user()
    {
        return $this->belongsTo(MainUser::class, 'user_id');
    }
}
