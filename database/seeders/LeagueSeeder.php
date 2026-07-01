<?php

namespace Database\Seeders;

use App\Models\League;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class LeagueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $leagues = [
            ['name' => 'Premier League', 'country' => 'England'],
            ['name' => 'La Liga', 'country' => 'Spain'],
            ['name' => 'Serie A', 'country' => 'Italy'],
            ['name' => 'Bundesliga', 'country' => 'Germany'],
            ['name' => 'Ligue 1', 'country' => 'France'],
            ['name' => 'UEFA Champions League', 'country' => 'Europe'],
            ['name' => 'FIFA World Cup', 'country' => 'International'],
            ['name' => 'UEFA Euro', 'country' => 'Europe'],
            ['name' => 'Copa America', 'country' => 'South America'],
            ['name' => 'Saudi Pro League', 'country' => 'Saudi Arabia'],
        ];

        foreach ($leagues as $index => $league) {
            League::create([
                'name' => $league['name'],
                'slug' => Str::slug($league['name']),
                'logo' => null,
                'country' => $league['country'],
                'sort_order' => $index + 1,
                'status' => true,
                'meta_title' => $league['name'],
                'meta_keywords' => strtolower(str_replace(' ', ',', $league['name'])),
                'meta_description' => 'Browse ' . $league['name'] . ' football jerseys.',
            ]);
        }
    }
}
