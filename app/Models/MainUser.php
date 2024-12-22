<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Model;

class MainUser extends Model
{
    use Notifiable, HasRoles;

    public $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'full_name_slug', 'mobile', 'email', 'account_type', 'password', 'avatar', 'incorrect_attempts',
        'is_suspended',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
    */
    protected $hidden = [
        'password', 'remember_token',
    ];


    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Get the guard name for the model.
     *
     * @return string
     */
    public function getGuardName()
    {
        return 'web'; // or the guard you are using
    }

    public function business()
    {
        return $this->hasOne(Business::class, 'user_id');
    }
}