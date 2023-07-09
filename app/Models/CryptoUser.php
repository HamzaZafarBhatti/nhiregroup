<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CryptoUser extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'wallet_address',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
