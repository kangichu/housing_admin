<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Description extends Model
{
    protected $fillable = ['type', 'description','section',];

    // Event listener for creating a new description
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($description) {
            // Find the highest section for the given type
            $maxSection = self::where('type', $description->type)->max('section');

            // Increment the highest section by 1 or set it to 1 if it doesn't exist
            $description->section = $maxSection ? $maxSection + 1 : 1;
        });
    }

}
