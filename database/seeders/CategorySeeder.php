<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'parent_id' => null,
                'name' => 'Club Jerseys',
                'slug' => Str::slug('Club Jerseys'),
                'image' => 'categories/1.jpg',
                'meta_title' => 'Club Jerseys',
                'meta_keywords' => 'club jerseys, football jerseys, soccer jerseys',
                'meta_description' => 'Shop official club football jerseys from top teams around the world.',
            ],
            [
                'parent_id' => null,
                'name' => 'National Teams',
                'slug' => Str::slug('National Teams'),
                'image' => 'categories/2.jpg',
                'meta_title' => 'National Teams',
                'meta_keywords' => 'national team jerseys, world cup jerseys, football',
                'meta_description' => 'Browse jerseys of your favorite national football teams.',
            ],
            [
                'parent_id' => null,
                'name' => 'Retro Jerseys',
                'slug' => Str::slug('Retro Jerseys'),
                'image' => 'categories/3.jpg',
                'meta_title' => 'Retro Jerseys',
                'meta_keywords' => 'retro jerseys, vintage football shirts',
                'meta_description' => 'Explore classic and vintage football jerseys from legendary seasons.',
            ],
            [
                'parent_id' => null,
                'name' => 'Player Version',
                'slug' => Str::slug('Player Version'),
                'image' => 'categories/4.jpg',
                'meta_title' => 'Player Version',
                'meta_keywords' => 'player version jerseys, authentic football jerseys',
                'meta_description' => 'Premium player version football jerseys with authentic quality.',
            ],
            [
                'parent_id' => null,
                'name' => 'Fan Version',
                'slug' => Str::slug('Fan Version'),
                'image' => 'categories/5.jpg',
                'meta_title' => 'Fan Version',
                'meta_keywords' => 'fan version jerseys, supporter jerseys',
                'meta_description' => 'Comfortable fan version football jerseys for everyday wear.',
            ],
            [
                'parent_id' => null,
                'name' => 'Training Wear',
                'slug' => Str::slug('Training Wear'),
                'image' => 'categories/6.jpg',
                'meta_title' => 'Training Wear',
                'meta_keywords' => 'training wear, football training kit',
                'meta_description' => 'Training jerseys, shorts and jackets for football practice.',
            ],
            [
                'parent_id' => null,
                'name' => 'Accessories',
                'slug' => Str::slug('Accessories'),
                'image' => 'categories/7.jpg',
                'meta_title' => 'Accessories',
                'meta_keywords' => 'football accessories, socks, caps, bags',
                'meta_description' => 'Complete your football gear with premium accessories.',
            ],
        ];

        foreach ($categories as $category) {
            Category::query()->create(array_merge($category, [
                'active' => true,
            ]));
        }
    }
}
