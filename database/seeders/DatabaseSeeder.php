<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $this->call([
            UserSeeder::class,
            CategorySeeder::class,
            BrandSeeder::class,
            LeagueSeeder::class,
            ClubSeeder::class,
            BannerSeeder::class,
            ProductSeeder::class,
            CouponSeeder::class,
        ]);
    }
}
