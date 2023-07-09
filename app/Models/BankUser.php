<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BankUser extends Model
{
    use HasFactory;

    protected $fillable = [
        'bank_id',
        'user_id',
        'is_primary',
        'account_name',
        'account_number',
        'account_type',
    ];

    public function bank()
    {
        return $this->belongsTo(Bank::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    protected function getBankDetails(): Attribute
    {
        return Attribute::make(
            get: fn ($val, $attr) => $this->account_name . ' - ' . $this->account_number . ' - ' . $this->bank->name
        );
    }
}
