<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\PlayerController;

// Home Page
Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);

// Matches Page
Route::get('/matches', [App\Http\Controllers\MatchesController::class, 'index'] );

// 1. The Route to see the page (This fixes your error)
Route::get('/contact', [ContactController::class, 'index']);

// 2. The Route to handle the form submission
Route::post('/contact', [ContactController::class, 'store']);
Route::get('/player', [PlayerController::class, 'index']);
