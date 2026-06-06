<?php

namespace App\Http\Controllers;

use App\Models\MatchSchedule;
use Carbon\Carbon;

class MatchesController extends Controller
{
    public function index() {
        $matches = MatchSchedule::where('match_date', '>=', Carbon::today())
            ->orderBy('match_date', 'asc')
            ->get();

        return view('matches', compact('matches'));
    }
}
