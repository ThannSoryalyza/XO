<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MatchSchedule;

class MatchScheduleSeeder extends Seeder
{
    public function run(): void
    {
        // 1. This clears the table first so you don't get duplicates
        MatchSchedule::truncate();

        // 2. Your matches from phpMyAdmin
        MatchSchedule::create([
            'home_team' => 'Nagaworld FC',
            'away_team' => 'XO United',
            'match_date' => '2026-05-17',
            'match_time' => '15:30:00',
            'Finish_time' => '17:30:00',
            'stadium' => 'Kampong Speu Stadium',
            'location_type' => 'Away'
        ]);

        MatchSchedule::create([
            'home_team' => 'XO United',
            'away_team' => 'Kompong Chhnang',
            'match_date' => '2026-05-24',
            'match_time' => '15:30:00',
            'Finish_time' => '17:30:00',
            'stadium' => 'ISI PARK Stadium',
            'location_type' => 'Home'
        ]);

        MatchSchedule::create([
            'home_team' => 'Siem Reap FC',
            'away_team' => 'XO United',
            'match_date' => '2026-05-31',
            'match_time' => '15:30:00',
            'Finish_time' => '17:30:00',
            'stadium' => 'Svay Thom Stadium',
            'location_type' => 'Away'
        ]);

        MatchSchedule::create([
            'home_team' => 'PKRSVR FC',
            'away_team' => 'XO United',
            'match_date' => '2026-06-07',
            'match_time' => '15:30:00',
            'Finish_time' => '17:30:00',
            'stadium' => 'PKRSVR Training Center',
            'location_type' => 'Away'
        ]);
    }
}
