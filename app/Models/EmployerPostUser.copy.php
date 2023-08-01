<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployerPostUser extends Model
{
    use HasFactory;

    protected $fillable = [
        'employer_id',
        'employer_post_id',
        'user_id',
        'cashed_out',
        'amount',
    ];

    public function employer()
    {
        return $this->belongsTo(Employer::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function employer_post()
    {
        return $this->belongsTo(EmployerPost::class, 'employer_post_id');
    }

    protected function getTime(): Attribute
    {
        return Attribute::make(
            get: fn ($val, $attr) => date('h:i A - M d, Y', strtotime($this->created_at))
        );
    }

    protected function getAmount(): Attribute
    {
        return Attribute::make(
            get: fn ($val, $attr) => '₦ ' . $this->amount
        );
    }
}
