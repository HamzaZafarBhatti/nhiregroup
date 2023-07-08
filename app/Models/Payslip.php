<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payslip extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'reference',
        'direct_earning',
        'indirect_earning',
        'tax',
        'expected_earning',
        'status', //'0', '1', '2'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    protected function getDirectEarning(): Attribute
    {
        return Attribute::make(
            get: fn ($val, $attr) => '₦' . $this->direct_earning
        );
    }

    protected function getIndirectEarning(): Attribute
    {
        return Attribute::make(
            get: fn ($val, $attr) => '₦' . $this->indirect_earning
        );
    }

    protected function getExpectedEarning(): Attribute
    {
        return Attribute::make(
            get: fn ($val, $attr) => '₦' . $this->expected_earning
        );
    }

    protected function getStatus(): Attribute
    {
        return Attribute::make(
            get: function ($val, $attr) {
                switch ($this->status) {
                    case '0':
                        return 'Pending';
                        break;
                    case '1':
                        return 'Completed';
                        break;
                    case '2':
                        return 'Rejected';
                        break;
                    default:
                        return '';
                        break;
                }
            }
        );
    }


    protected function getCreatedAt(): Attribute
    {
        return Attribute::make(
            get: fn ($val, $attr) => date('h:i A - M d, Y', strtotime($this->created_at))
        );
    }
}
