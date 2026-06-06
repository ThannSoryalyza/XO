<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LeagueStandingSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('league_standings')->truncate();

        $clubs = [
            ['position' => 1, 'club_name' => 'XO UNITED FC', 'logo' => 'img/XO.png', 'played' => 20, 'won' => 14, 'drawn' => 4, 'lost' => 2, 'goals_for' => 38, 'goals_against' => 12, 'points' => 46],
            ['position' => 2, 'club_name' => 'Phnom Penh Crown FC', 'logo' => 'img/PPC.png', 'played' => 20, 'won' => 13, 'drawn' => 3, 'lost' => 4, 'goals_for' => 35, 'goals_against' => 18, 'points' => 42],
            ['position' => 3, 'club_name' => 'Visakha FC', 'logo' => 'img/VSK.png', 'played' => 20, 'won' => 11, 'drawn' => 5, 'lost' => 4, 'goals_for' => 30, 'goals_against' => 20, 'points' => 38],
            ['position' => 4, 'club_name' => 'PKRSVR FC', 'logo' => 'img/PKR.png', 'played' => 20, 'won' => 10, 'drawn' => 4, 'lost' => 6, 'goals_for' => 28, 'goals_against' => 22, 'points' => 34],
            ['position' => 5, 'club_name' => 'Boeung Ket FC', 'logo' => 'img/BK.png', 'played' => 20, 'won' => 9, 'drawn' => 5, 'lost' => 6, 'goals_for' => 27, 'goals_against' => 24, 'points' => 32],
            ['position' => 6, 'club_name' => 'NagaWorld FC', 'logo' => 'img/NAGA.png', 'played' => 20, 'won' => 8, 'drawn' => 4, 'lost' => 8, 'goals_for' => 25, 'goals_against' => 26, 'points' => 28],
            ['position' => 7, 'club_name' => 'Kompong Chhnang FC', 'logo' => 'img/kpc.jpg', 'played' => 20, 'won' => 6, 'drawn' => 5, 'lost' => 9, 'goals_for' => 20, 'goals_against' => 30, 'points' => 23],
            ['position' => 8, 'club_name' => 'Seim Reap FC', 'logo' => 'img/SR.png', 'played' => 20, 'won' => 4, 'drawn' => 4, 'lost' => 12, 'goals_for' => 15, 'goals_against' => 38, 'points' => 16],
        ];

        foreach ($clubs as $club) {
            $club['goal_difference'] = $club['goals_for'] - $club['goals_against'];
            $club['created_at'] = now();
            $club['updated_at'] = now();
            DB::table('league_standings')->insert($club);
        }
    }
}
