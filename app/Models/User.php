<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Casts\Attribute;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'username',
        'email',
        'password',
        'role',
        'avatar',
        'ref_bonus',
        'indirect_ref_bonus',
        'points',
        'address',
        'city',
        'state',
        'zipcode',
        'country',
        'phone',
        'parent_id',
        'is_blocked',
        'darkmode',
        'is_first_login',
        'package_id',
        'epin_id',
        'clear_points_at',
        'salary_dashboard_access',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function settings()
    {
        return $this->hasMany(SettingUser::class);
    }

    public function parent()
    {
        return $this->belongsTo(self::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(self::class, 'parent_id', 'id');
    }

    public function package()
    {
        return $this->belongsTo(Package::class);
    }

    public function direct_refferals()
    {
        return $this->hasMany(DirectReferralLog::class, 'upline_id');
    }

    public function indirect_refferals()
    {
        return $this->hasMany(IndirectReferralLog::class, 'upline_id');
    }

    protected function getFullAddress(): Attribute
    {
        $address_arr = [
            $this->address,
            $this->city,
            $this->state,
            $this->country,
        ];
        return Attribute::make(
            get: fn ($val, $attr) => implode(', ', $address_arr)
        );
    }

    public function salary_withdrawals()
    {
        return $this->hasMany(SalaryWithdrawal::class);
    }

    public function latest_salary_withdrawal()
    {
        return $this->hasOne(SalaryWithdrawal::class)->latestOfMany();
    }
}
