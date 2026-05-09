<?php
namespace App\Http\Controllers;

use App\Models\Service; // Assuming you created a Service model
use Illuminate\Http\Request;

class HomeController extends Controller
{
  public function index() {
    $services = \App\Models\Service::all();
    return view('home', compact('services'));
}
}
