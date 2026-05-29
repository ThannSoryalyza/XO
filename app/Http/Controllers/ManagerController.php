<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Manager; // ◄── Make sure this import is here!

class ManagerController extends Controller
{
    public function index()
    {
        // Fetch all managers from database
        $managers = Manager::all();

        // This MUST point exactly to resources/views/manager.blade.php
        return view('manager', compact('managers'));
    }
}
