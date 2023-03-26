<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Setting::query()->truncate();
        Setting::create([
            'site_name' => 'NHire Group',
            'site_description' => 'This is demo description',
            'site_keywords' => 'Laravel, Jobs, Nhire, Team, Earn',
            'site_logo' => '',
            'site_favicon' => '',
            'email' => 'support@nhiregroup.com',
            'address' => 'Demo Address',
            'phone' => '123123123123',
            'email_notification' => true,
        ]);
    }
}
