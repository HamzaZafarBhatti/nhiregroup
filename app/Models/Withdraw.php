<?php

namespace App\Models;

use App\Enum\WithdrawStatusEnum;
use App\Enum\WithdrawToEnum;
use App\Enum\WithdrawWalletTypeEnum;
use Illuminate\Database\Eloquent\Casts\Attribute;
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

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function bank_user()
    {
        return $this->belongsTo(BankUser::class, 'bank_user_id');
    }

    public function usdt_wallet()
    {
        return $this->belongsTo(CryptoUser::class, 'usdt_wallet_id');
    }

    protected function getAmount(): Attribute
    {
        return Attribute::make(
            get: fn ($val, $attr) => '₦' . $this->amount
        );
    }

    protected function getStatus(): Attribute
    {
        return Attribute::make(
            get: fn ($val, $attr) => match ($this->status->value) {
                '0' => '<span class="badge bg-warning">Pending</span>',
                '1' => '<span class="badge bg-success">Accepted</span>',
                '2' => '<span class="badge bg-danger">Rejected</span>',
            }
        );
    }

    protected $casts = [
        'wallet_type' => WithdrawWalletTypeEnum::class,
        'withdraw_to' => WithdrawToEnum::class,
        'status' => WithdrawStatusEnum::class,
    ];
}
