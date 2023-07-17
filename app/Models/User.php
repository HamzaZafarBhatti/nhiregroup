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
        'timeslot_id',
        'nhire_wallet',
        'earning_wallet',
        'first_name',
        'last_name',
        'mother_name',
        'nationality',
        'religion',
        'blood_group',
        'social_links',
        'dob',
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

    public function timeslot()
    {
        return $this->belongsTo(Timeslot::class);
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

    public function epin()
    {
        return $this->belongsTo(Epin::class);
    }

    public function direct_refferals()
    {
        return $this->hasMany(DirectReferralLog::class, 'upline_id');
    }

    public function indirect_refferals()
    {
        return $this->hasMany(IndirectReferralLog::class, 'upline_id');
    }

    public function salaryprofile_request()
    {
        return $this->hasOne(SalaryprofileRequest::class)->latestOfMany();
    }

    public function salary_withdrawals()
    {
        return $this->hasMany(SalaryWithdrawal::class);
    }

    public function latest_salary_withdrawal()
    {
        return $this->hasOne(SalaryWithdrawal::class)->latestOfMany();
    }

    public function works()
    {
        return $this->hasMany(EmployerPostUser::class);
    }

    public function cashed_out_works()
    {
        return $this->hasMany(EmployerPostUser::class)->where('cashed_out', 1);
    }

    public function primary_bank()
    {
        return $this->hasOne(BankUser::class)->where('is_primary', 1);
    }

    protected function getDirectRefBonus(): Attribute
    {
        return Attribute::make(
            get: fn ($val, $attr) => '₦' . $this->ref_bonus
        );
    }

    protected function getIndirectRefBonus(): Attribute
    {
        return Attribute::make(
            get: fn ($val, $attr) => '₦' . $this->indirect_ref_bonus
        );
    }

    protected function getNhireWallet(): Attribute
    {
        return Attribute::make(
            get: fn ($val, $attr) => '₦' . $this->nhire_wallet
        );
    }

    protected function getEarningWallet(): Attribute
    {
        return Attribute::make(
            get: fn ($val, $attr) => '₦' . $this->earning_wallet
        );
    }

    protected function getTotalIncome(): Attribute
    {
        return Attribute::make(
            get: fn ($val, $attr) => '₦' . ($this->nhire_wallet + $this->earning_wallet)
        );
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
}
