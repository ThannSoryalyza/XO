<?php

use Illuminate\Support\Facades\Route;
use App\Models\MatchSchedule;
use App\Http\Controllers\ContactController;


// Home Page
Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);

// Matches Page
Route::get('/matches', [App\Http\Controllers\MatchesController::class, 'index'] );

// View the page
Route::get('/contact', [ContactController::class, 'index']);

// Send the message
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');


