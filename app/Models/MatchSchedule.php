<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MatchSchedule extends Model
{
    protected $fillable = ['image', 'home_team', 'away_team', 'match_date', 'match_time','Finish_time', 'stadium', 'location_type'];
}
