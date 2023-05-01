<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;

class SalaryprofileRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'status', // 0 => pending, 1 => accepted, 2 => rejected
        'rejection_reason',
        'subadmin_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function subadmin()
    {
        return $this->belongsTo(User::class, 'subadmin_id');
    }

    protected function getStatus(): Attribute
    {
        return Attribute::make(
            get: function ($val, $attr) {
                switch ($this->status) {
                    case 0:
                        return 'Pending';
                        break;
                    case 1:
                        return 'Accepted';
                        break;
                    case 2:
                        return 'Rejected';
                        break;
                    default:
                        return '';
                        break;
                }
            }
        );
    }
}
