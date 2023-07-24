<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;

class SalaryprofileRequest extends Model
{
    use HasFactory;

    protected $image_path = 'assets/uploads/salary_profile_proofs/';

    protected $fillable = [
        'user_id',
        'status', // 0 => pending, 1 => accepted, 2 => rejected
        'rejection_reason',
        'subadmin_id',
        'is_paid',
        'subadmin_approve_payment',
        'image_proof',
    ];

    public function getImagePath()
    {
        return $this->image_path;
    }

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

    protected function getImageProof(): Attribute
    {
        return Attribute::make(
            get: fn ($val, $attr) => $this->image_proof ? asset($this->image_path . $this->image_proof) : null
        );
    }
}
