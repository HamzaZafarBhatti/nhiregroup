<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Epin extends Model
{
    use HasFactory;

    protected $fillable = [
        'package_id',
        'serial',
        'is_purchased',
        'generated_by',
    ];

    public function package()
    {
        return $this->belongsTo(Package::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'generated_by')->withDefault([
            'name' => 'N/A'
        ]);
    }

    public function used_by()
    {
        return $this->hasOne(User::class);
    }
}
