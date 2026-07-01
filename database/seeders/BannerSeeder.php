<?php

namespace Database\Seeders;

use App\Models\Banner;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class BannerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $banners = [
            [
                'title' => 'New Season Football Jerseys',
                'subtitle' => '2025/26 Collection',
                'description' => 'Discover the latest official football jerseys from top clubs and national teams.',
                'image' => 'banners/hero.jpg',
                'sort_order' => 1,
                'starts_at' => Carbon::now(),
                'ends_at' => Carbon::now()->copy()->addYear(),
                'active' => true,
            ],
            [
                'title' => 'Flat 10% OFF',
                'subtitle' => 'Limited Time Offer',
                'description' => 'Use coupon JERSEY10 and save on your first order.',
                'image' => 'banners/hero.jpg',
                'sort_order' => 2,
                'starts_at' => Carbon::now(),
                'ends_at' => Carbon::now()->copy()->addMonth(),
                'active' => true,
            ],
            [
                'title' => 'Free Shipping',
                'subtitle' => 'Orders Over ৳1999',
                'description' => 'Enjoy free nationwide delivery on qualifying orders.',
                'image' => 'banners/hero.jpg',
                'sort_order' => 1,
                'starts_at' => Carbon::now(),
                'ends_at' => null,
                'active' => true,
            ],
            [
                'title' => 'Player Version Jerseys',
                'subtitle' => 'Premium Quality',
                'description' => 'Wear what your favorite players wear on the pitch.',
                'image' => 'banners/hero.jpg',
                'sort_order' => 1,
                'starts_at' => Carbon::now(),
                'ends_at' => null,
                'active' => true,
            ],
        ];

        foreach ($banners as $banner) {
            Banner::create($banner);
        }
    }
}
