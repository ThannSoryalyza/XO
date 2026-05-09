<?php

namespace App\Http\Controllers;

use App\Models\MatchSchedule;
use Illuminate\Http\Request;

class MatchesController extends Controller
{
    public function index() {
        // Fetch matches and sort them by date (soonest first)
        $matches = MatchSchedule::orderBy('match_date', 'asc')->get();

        return view('matches', compact('matches'));
    }
}
