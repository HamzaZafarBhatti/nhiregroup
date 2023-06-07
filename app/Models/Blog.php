<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $image_path = 'assets/uploads/blog_images/';

    protected $fillable = [
        'title',
        'slug',
        'description',
        'image',
        'is_active',
        'post_date',
    ];

    public function getImagePath()
    {
        return $this->image_path;
    }

    public function scopeActive($query)
    {
        $query->where('is_active', 1);
    }

    protected function getImage(): Attribute
    {
        return Attribute::make(
            get: fn ($val, $attr) => $this->image ? asset($this->image_path . $this->image) : null
        );
    }
}
