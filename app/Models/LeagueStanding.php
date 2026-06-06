<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LeagueStanding extends Model
{
    protected $fillable = [
        'position',
        'club_name',
        'logo',
        'played',
        'won',
        'drawn',
        'lost',
        'goals_for',
        'goals_against',
        'points',
    ];

    protected static function booted(): void
    {
        static::saving(function (LeagueStanding $standing) {
            $standing->goal_difference = $standing->goals_for - $standing->goals_against;
        });
    }
}
