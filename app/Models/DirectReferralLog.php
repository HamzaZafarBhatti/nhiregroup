<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DirectReferralLog extends Model
{
    use HasFactory;

    protected $fillable = [
        'upline_id',
        'downline_id',
        'amount',
    ];

    public function upline()
    {
        return $this->belongsTo(User::class, 'upline_id');
    }

    public function downline()
    {
        return $this->belongsTo(User::class, 'downline_id');
    }

    protected function getAmount(): Attribute
    {
        return Attribute::make(
            get: fn ($val, $attr) => '₦ ' . $this->amount
        );
    }
}
