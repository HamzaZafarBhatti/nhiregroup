<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobStep extends Model
{
    use HasFactory;

    protected $fillable = [
        'employer_post_id',
        'step',
        'description',
        'priority'
    ];

    public function employerPost()
    {
        return $this->belongsTo(EmployerPost::class);
    }
}
