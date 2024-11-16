<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SocialMedia extends Model
{
    use HasFactory;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'referral_code',
        'post',
        'image',
        'image_path',
        'status',
        'platform',
        'tags',
        'schedule',
        'repeat',
        'repeat_every',
        'repeat_ends',
    ];
}
