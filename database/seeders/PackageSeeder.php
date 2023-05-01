<?php

namespace Database\Seeders;

use App\Models\Package;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PackageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Package::create([
            'name' => 'Part time',
            'epin_prefix' => 'PAT',
            'price' => 3700,
            'grade' => 1,
            'direct_ref_bonus' => 2300,
            'indirect_ref_bonus' => 200,
            'epin_length' => 8,
            'min_points_to_cashout' => 10,
            'points' => .2,
            'salary_dashboard_fee' => 1500,
            'is_active' => true,
        ]);
    }
}
