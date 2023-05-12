<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        User::factory()->create([
            'name' => 'Admin Nhire',
            'username' => 'AdminNhire',
            'email' => 'admin@nhiregroup.com',
            'role' => 'Admin',
            'is_first_login' => 0
        ]);
    }
}
