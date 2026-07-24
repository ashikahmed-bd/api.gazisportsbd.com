<?php

namespace Database\Seeders;

use App\Models\Club;
use App\Models\League;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ClubSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $clubs = [

            // Premier League
            'Premier League' => [
                'Manchester United',
                'Manchester City',
                'Liverpool',
                'Chelsea',
                'Arsenal',
                'Tottenham Hotspur',
            ],

            // La Liga
            'La Liga' => [
                'Real Madrid',
                'Barcelona',
                'Atletico Madrid',
                'Sevilla',
            ],

            // Serie A
            'Serie A' => [
                'Juventus',
                'AC Milan',
                'Inter Milan',
                'Napoli',
            ],

            // Bundesliga
            'Bundesliga' => [
                'Bayern Munich',
                'Borussia Dortmund',
                'RB Leipzig',
                'Bayer Leverkusen',
            ],

            // Ligue 1
            'Ligue 1' => [
                'Paris Saint-Germain',
                'Marseille',
                'Lyon',
                'Monaco',
            ],

            // Saudi Pro League
            'Saudi Pro League' => [
                'Al Nassr',
                'Al Hilal',
                'Al Ittihad',
                'Al Ahli',
            ],

            // FIFA World Cup
            'FIFA World Cup' => [
                'Argentina',
                'Brazil',
                'France',
                'Germany',
                'Spain',
                'Portugal',
                'England',
                'Italy',
                'Netherlands',
                'Belgium',
                'Croatia',
                'Uruguay',
            ],
        ];

        $sort = 1;

        foreach ($clubs as $leagueName => $teams) {
            $league = League::query()->where('name', $leagueName)->first();
            foreach ($teams as $team) {
                Club::create([
                    'league_id' => $league?->id,

                    'name' => $team,
                    'slug' => Str::slug($team),

                    'logo' => null,
                    'country' => null,
                    'founded_year' => null,
                    'stadium' => null,
                    'sort_order' => $sort++,
                    'active' => true,
                    'meta_title' => $team,
                    'meta_keywords' => strtolower(str_replace(' ', ',', $team)),
                    'meta_description' => $team . ' official football jerseys.',
                ]);
            }
        }
    }
}
