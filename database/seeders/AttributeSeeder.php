<?php

namespace Database\Seeders;

use App\Models\Attribute;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AttributeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $attributes = [
            [
                'name' => 'Color',
                'slug' => 'color',
                'type' => 'color',
                'options' => [
                    ['name' => 'Black', 'slug' => 'black', 'hex' => '#000000'],
                    ['name' => 'White', 'slug' => 'white', 'hex' => '#FFFFFF'],
                    ['name' => 'Red', 'slug' => 'red', 'hex' => '#EF4444'],
                    ['name' => 'Green', 'slug' => 'green', 'hex' => '#22C55E'],
                    ['name' => 'Blue', 'slug' => 'blue', 'hex' => '#3B82F6'],
                    ['name' => 'Yellow', 'slug' => 'yellow', 'hex' => '#EAB308'],
                    ['name' => 'Pink', 'slug' => 'pink', 'hex' => '#EC4899'],
                    ['name' => 'Purple', 'slug' => 'purple', 'hex' => '#A855F7'],
                    ['name' => 'Orange', 'slug' => 'orange', 'hex' => '#F97316'],
                    ['name' => 'Navy Blue', 'slug' => 'navy-blue', 'hex' => '#1E3A8A'],
                ],
            ],

            [
                'name' => 'Size',
                'slug' => 'size',
                'type' => 'select',
                'options' => [
                    ['name' => 'XS', 'slug' => 'xs'],
                    ['name' => 'S', 'slug' => 's'],
                    ['name' => 'M', 'slug' => 'm'],
                    ['name' => 'L', 'slug' => 'l'],
                    ['name' => 'XL', 'slug' => 'xl'],
                    ['name' => 'XXL', 'slug' => 'xxl'],
                    ['name' => '3XL', 'slug' => '3xl'],
                    ['name' => '4XL', 'slug' => '4xl'],
                ],
            ],

            [
                'name' => 'Sleeves',
                'slug' => 'sleeves',
                'type' => 'select',
                'options' => [
                    ['name' => 'Half Sleeve', 'slug' => 'half-sleeve'],
                    ['name' => 'Full Sleeve', 'slug' => 'full-sleeve'],
                    ['name' => 'Sleeveless', 'slug' => 'sleeveless'],
                ],
            ],

            [
                'name' => 'Material',
                'slug' => 'material',
                'type' => 'select',
                'options' => [
                    ['name' => 'Cotton', 'slug' => 'cotton'],
                    ['name' => 'Polyester', 'slug' => 'polyester'],
                    ['name' => 'Wool', 'slug' => 'wool'],
                    ['name' => 'Silk', 'slug' => 'silk'],
                    ['name' => 'Linen', 'slug' => 'linen'],
                    ['name' => 'Leather', 'slug' => 'leather'],
                    ['name' => 'Denim', 'slug' => 'denim'],
                    ['name' => 'Nylon', 'slug' => 'nylon'],
                    ['name' => 'Rayon', 'slug' => 'rayon'],
                ],
            ],

        ];


        foreach ($attributes as $index => $data) {
            $options = $data['options'];

            unset($data['options']);

            $attribute = Attribute::updateOrCreate(
                [
                    'slug' => $data['slug'],
                ],
                [
                    'name' => $data['name'],
                    'type' => $data['type'],
                    'sort_order' => $index + 1,
                ]
            );

            foreach ($options as $optionIndex => $option) {
                $attribute->options()->updateOrCreate(
                    [
                        'slug' => $option['slug'],
                    ],
                    [
                        'name' => $option['name'],
                        'hex' => $option['hex'] ?? null,
                        'sort_order' => $optionIndex + 1,
                    ]
                );
            }
        }
    }
}
