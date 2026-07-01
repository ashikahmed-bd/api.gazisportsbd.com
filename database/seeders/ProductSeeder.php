<?php

namespace Database\Seeders;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Club;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            [
                'name' => 'Real Madrid Home Jersey 2025/26',
                'slug' => Str::slug('Real Madrid Home Jersey 2025/26'),
                'base_price' => 500,
                'price' => 350,
            ],
            [
                'name' => 'Barcelona Home Jersey 2025/26',
                'slug' => Str::slug('Barcelona Home Jersey 2025/26'),
                'base_price' => 500,
                'price' => 350,
            ],
            [
                'name' => 'Manchester United Home Jersey',
                'slug' => Str::slug('Manchester United Home Jersey'),
                'base_price' => 500,
                'price' => 350,
            ],
            [
                'name' => 'Liverpool Home Jersey',
                'slug' => Str::slug('Liverpool Home Jersey'),
                'base_price' => 500,
                'price' => 350,
            ],
            [
                'name' => 'Chelsea Home Jersey',
                'slug' => Str::slug('Chelsea Home Jersey'),
                'base_price' => 500,
                'price' => 350,
            ],
            [
                'name' => 'Arsenal Home Jersey',
                'slug' => Str::slug('Arsenal Home Jersey'),
                'base_price' => 500,
                'price' => 350,
            ],
            [
                'name' => 'Bayern Munich Home Jersey',
                'slug' => Str::slug('Bayern Munich Home Jersey'),
                'base_price' => 500,
                'price' => 350,
            ],
            [
                'name' => 'PSG Home Jersey',
                'slug' => Str::slug('PSG Home Jersey'),
                'base_price' => 500,
                'price' => 350,
            ],
            [
                'name' => 'Argentina Home Jersey',
                'slug' => Str::slug('Argentina Home Jersey'),
                'base_price' => 500,
                'price' => 350,
            ],
            [
                'name' => 'Brazil Home Jersey',
                'slug' => Str::slug('Brazil Home Jersey'),
                'base_price' => 500,
                'price' => 350,
            ],
            [
                'name' => 'France Home Jersey',
                'slug' => Str::slug('France Home Jersey'),
                'base_price' => 500,
                'price' => 350,
            ],
            [
                'name' => 'Germany Home Jersey',
                'slug' => Str::slug('Germany Home Jersey'),
                'base_price' => 500,
                'price' => 350,
            ],
        ];

        foreach ($products as $product) {
            Product::query()->create(array_merge($product, [
                'category_id' => fake()->randomElement(Category::query()->pluck('id')->toArray()),
                'brand_id' => fake()->randomElement(Brand::query()->pluck('id')->toArray()),
                'club_id' => fake()->randomElement(Club::query()->pluck('id')->toArray()),

                'highlights' => '<ul>
                    <li>100% Premium Polyester</li>
                    <li>Official Club Design</li>
                    <li>Breathable Fabric</li>
                    <li>Comfort Fit</li>
                    <li>Cash on Delivery Available</li>
                    </ul>',

                'description' => '
                <p>Premium quality football jersey made from breathable polyester fabric.</p>

                <ul>
                <li>Soft & Comfortable</li>
                <li>Quick Dry Technology</li>
                <li>Perfect for Match & Casual Wear</li>
                <li>Long Lasting Print</li>
                </ul>
                ',

                'options' => [
                    'Color' => ['Black', 'White', 'Blue'],
                    'Size' => ['S', 'M', 'L', 'XL', 'XXL']
                ],

                'stock' => rand(20, 150),

                'gender' => 'Unisex',
                'cover' => null,
                'gallery' => [
                    'products/default.jpg',
                    'products/default.jpg',
                    'products/default.jpg'
                ],

                'meta_title' => 'Amazing Product - High Quality and Affordable',
                'meta_description' => 'Discover our amazing product with top-notch quality and unbeatable price. Perfect for your needs and lifestyle.',
                'meta_keywords' => 'amazing product, high quality, affordable, best product, top product',
                'views' => rand(100, 5000),
                'featured' => true,
                'active' => true,
            ]));
        }
    }
}
