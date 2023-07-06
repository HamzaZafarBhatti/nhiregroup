<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'price',
        'grade',
        'direct_ref_bonus',
        'indirect_ref_bonus',
        'is_active',
        'epin_prefix',
        'epin_length',
        'min_points_to_cashout',
        'points',
        'salary_dashboard_fee',
        'expiry_time',
        'payslip_tax',
    ];

    public function scopeActive($query)
    {
        $query->where('is_active', 1);
    }
}
