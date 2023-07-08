<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Withdraw extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'wallet_type', // nhire, earning
        'withdraw_to', // bank, usdt
        'amount',
        'bank_user_id',
        'usdt_wallet_id',
        'status', //'0', '1', '2'
    ];
}
