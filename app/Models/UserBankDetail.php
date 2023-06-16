<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserBankDetail extends Model
{
    protected $table = "users_bank_details";

    protected $fillable = [
        'user_id',
        'bank_code',
        'account_number'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'id', 'user_id');
    }
}
