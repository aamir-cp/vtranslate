<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserSpecializations extends Model
{
    use HasFactory;

     protected $casts = [
        'spicializations' => 'array',
    ];

     protected $guarded = []; 
}
