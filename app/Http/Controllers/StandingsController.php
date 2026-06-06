<?php

namespace App\Http\Controllers;

use App\Models\LeagueStanding;

class StandingsController extends Controller
{
    public function index()
    {
        $standings = LeagueStanding::orderBy('position')->get();

        return view('standings', compact('standings'));
    }
}
