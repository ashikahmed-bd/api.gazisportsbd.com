<?php

namespace Database\Seeders;

use App\Models\Brand;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $brands = [
            [
                'name' => 'Nike',
                'country' => 'United States',
            ],
            [
                'name' => 'Adidas',
                'country' => 'Germany',
            ],
            [
                'name' => 'Puma',
                'country' => 'Germany',
            ],
            [
                'name' => 'New Balance',
                'country' => 'United States',
            ],
            [
                'name' => 'Umbro',
                'country' => 'England',
            ],
            [
                'name' => 'Kappa',
                'country' => 'Italy',
            ],
            [
                'name' => 'Macron',
                'country' => 'Italy',
            ],
            [
                'name' => 'Joma',
                'country' => 'Spain',
            ],
            [
                'name' => 'Hummel',
                'country' => 'Denmark',
            ],
            [
                'name' => 'Kelme',
                'country' => 'Spain',
            ],
            [
                'name' => 'Mizuno',
                'country' => 'Japan',
            ],
            [
                'name' => 'Under Armour',
                'country' => 'United States',
            ],
            [
                'name' => 'Castore',
                'country' => 'United Kingdom',
            ],
            [
                'name' => 'Errea',
                'country' => 'Italy',
            ],
            [
                'name' => 'JAKO',
                'country' => 'Germany',
            ],
        ];

        foreach ($brands as $brand) {
            Brand::create([
                'name' => $brand['name'],
                'slug' => Str::slug($brand['name']),
                'logo' => null,
                'country' => $brand['country'],

                'meta_title' => $brand['name'],
                'meta_keywords' => strtolower(str_replace(' ', ',', $brand['name'])) . ',sports,jersey',

                'meta_description' => $brand['name'] . ' official sportswear and football jersey collection.',

                'active' => true,
            ]);
        }
    }
}
