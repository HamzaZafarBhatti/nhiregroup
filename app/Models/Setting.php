<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected $logo_path = 'assets/uploads/logo/';
    protected $favicon_path = 'assets/uploads/favicon/';

    protected $fillable = [
        'site_name',
        'site_description',
        'site_keywords',
        'site_logo',
        'site_favicon',
        'email',
        'address',
        'phone',
        'email_notification',
        'point_cashout_amount',
        'earning_withdraw_on',
        'nhire_withdraw_on',
    ];

    public function getLogoPath()
    {
        return config('asset_url') . '/' . $this->logo_path;
    }

    public function getFaviconPath()
    {
        return $this->favicon_path;
    }
}
