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
    ];
}
