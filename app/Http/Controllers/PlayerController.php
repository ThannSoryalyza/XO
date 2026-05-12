<?php

namespace App\Http\Controllers;

use App\Models\Player; // Make sure you have a Player model
use Illuminate\Http\Request;

class PlayerController extends Controller
{
    public function index()
    {
        // Fetch all players from the database
        $players = Player::all();

        // Return the view you just showed me
        return view('player', compact('players'));
    }
}
