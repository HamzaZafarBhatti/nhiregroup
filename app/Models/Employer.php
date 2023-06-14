<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employer extends Model
{
    use HasFactory;

    protected $image_path = 'assets/uploads/employers/';

    protected $fillable = [
        'package_id',
        'avatar',
        'name',
        'earning_amount',
        'min_amount_to_move',
        'is_active',
    ];

    public function scopeActive($query)
    {
        $query->where('is_active', 1);
    }

    public function getImagePath()
    {
        return $this->image_path;
    }

    public function package()
    {
        return $this->belongsTo(Package::class);
    }

    protected function getStatus(): Attribute
    {
        return Attribute::make(
            get: fn ($val, $attr) => match ($this->is_active) {
                1 => '<span class="badge bg-success">Active</span>',
                0 => '<span class="badge bg-warning">Inactive</span>',
            }
        );
    }

    protected function getEarningAmount(): Attribute
    {
        return Attribute::make(
            get: fn ($val, $attr) => '₦ ' . $this->earning_amount
        );
    }

    protected function getMinAmount(): Attribute
    {
        return Attribute::make(
            get: fn ($val, $attr) => '₦ ' . $this->min_amount_to_move
        );
    }

    protected function getImage(): Attribute
    {
        return Attribute::make(
            get: fn ($val, $attr) => $this->avatar ? asset($this->getImagePath() . $this->avatar) : 'https://ui-avatars.com/api/name=' . urlencode($this->name)
        );
    }
}
