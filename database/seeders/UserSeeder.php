<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        User::create([
            'name' => 'Demo User',
            'username' => 'demoUser',
            'email' => 'user@nhiregroup.com',
            'email_verified_at' => now(),
            'password' => bcrypt('password'),
            'role' => 'User',
            'darkmode' => true,
            'package_id' => 1,
            'clear_points_at' => now(),
        ]);
    }
}
