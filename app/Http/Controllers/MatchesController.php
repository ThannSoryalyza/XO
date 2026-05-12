<?php

namespace App\Http\Controllers;

use App\Models\MatchSchedule;
use Illuminate\Http\Request;
use Carbon\Carbon; // This helps handle dates easily

class MatchesController extends Controller
{
    public function index() {
        // Only fetch matches where the date is TODAY or in the FUTURE
        $matches = MatchSchedule::where('match_date', '>=', Carbon::today())
            ->orderBy('match_date', 'asc')
            ->get();

        return view('matches', compact('matches'));
    }
}
