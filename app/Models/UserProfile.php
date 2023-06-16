<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{
    protected $table = "user_profile";

    protected $fillable = [
        'user_id',
        'profile_id',
    ];
}
