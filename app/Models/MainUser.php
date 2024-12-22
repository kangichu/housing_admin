<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MainUser extends Model
{
    use HasFactory;

    public $table = 'users';

    public function business()
    {
        return $this->hasOne(Business::class, 'user_id');
    }
}
