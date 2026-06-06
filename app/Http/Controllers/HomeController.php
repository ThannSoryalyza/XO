<?php

namespace App\Http\Controllers;

use App\Models\LeagueStanding;
use App\Models\MatchSchedule;
use App\Models\Player;
use App\Models\Service;
use Carbon\Carbon;

class HomeController extends Controller
{
    public function index()
    {
        $services = Service::all();
        $upcomingMatches = MatchSchedule::where('match_date', '>=', Carbon::today())
            ->orderBy('match_date', 'asc')
            ->limit(3)
            ->get();
        $standings = LeagueStanding::orderBy('position')->limit(5)->get();
        $playersCount = Player::count();

        return view('home', compact('services', 'upcomingMatches', 'standings', 'playersCount'));
    }
}
