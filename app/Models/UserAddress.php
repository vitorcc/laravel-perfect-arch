<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserAddress extends Model
{
    protected $table = "users_address";

    protected $fillable = [
        'user_id',
        'cellphone',
        'telephone',
        'zip_code',
        'address'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'id', 'user_id');
    }
}
