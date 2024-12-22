<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class indentificationNumber extends Model
{
    public $table = 'identification_cards';

    protected $fillable = [
        'identification_number','status', 'user_id',
    ];
}
