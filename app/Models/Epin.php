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
    ];
    
    public function package()
    {
        return $this->belongsTo(Package::class);
    }
}
