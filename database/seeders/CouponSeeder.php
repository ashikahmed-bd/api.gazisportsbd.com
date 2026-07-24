<?php

namespace Database\Seeders;

use App\Models\Coupon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class CouponSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Coupon::insert([
            [
                'code' => 'SAVE100',
                'type' => 'fixed',
                'discount' => 100,
                'minimum_amount' => 1000,
                'expires_at' => Carbon::parse('2026-12-31'),
                'active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'code' => 'EID10',
                'type' => 'percent',
                'discount' => 10,
                'minimum_amount' => 2000,
                'expires_at' => Carbon::parse('2026-07-31'),
                'active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'code' => 'WELCOME20',
                'type' => 'percent',
                'discount' => 20,
                'minimum_amount' => 1500,
                'expires_at' => null,
                'active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
