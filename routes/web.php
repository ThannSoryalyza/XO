<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;

// Public Front-End Controllers
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MatchesController;
use App\Http\Controllers\PlayerController;
use App\Http\Controllers\ManagerController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AdminController;

// Authentication & Administration Controllers
use App\Http\Controllers\Auth\LoginController;

/*
|--------------------------------------------------------------------------
| PUBLIC FRONTEND WEBSITE ROUTES
|--------------------------------------------------------------------------
*/
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/matches', [MatchesController::class, 'index'])->name('matches');
Route::get('/player', [PlayerController::class, 'index'])->name('player');
Route::get('/managers', [ManagerController::class, 'index'])->name('managers');

// Contact Page Routes
Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

/*
|--------------------------------------------------------------------------
| AUTHENTICATION ROUTES
|--------------------------------------------------------------------------
*/
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');




Route::prefix('admin')->name('admin.')->group(function () {
    // Core Dashboard
    Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');

    // Players
    Route::post('/players', [AdminController::class, 'storePlayer'])->name('players.store');
    Route::put('/players/{id}', [AdminController::class, 'updatePlayer'])->name('players.update');
    Route::delete('/players/{id}', [AdminController::class, 'destroyPlayer'])->name('players.destroy');

    // Managers
    Route::post('/managers', [AdminController::class, 'storeManager'])->name('managers.store');
    Route::put('/managers/{id}', [AdminController::class, 'updateManager'])->name('managers.update');
    Route::delete('/managers/{id}', [AdminController::class, 'destroyManager'])->name('managers.destroy');

    // Matches
    Route::post('/matches', [AdminController::class, 'storeMatch'])->name('matches.store');
    Route::put('/matches/{id}', [AdminController::class, 'updateMatch'])->name('matches.update');
    Route::delete('/matches/{id}', [AdminController::class, 'destroyMatch'])->name('matches.destroy');

    // Messages
    Route::post('/messages/{id}/read', [AdminController::class, 'markMessageRead'])->name('messages.read');
    Route::delete('/messages/{id}', [AdminController::class, 'destroyMessage'])->name('messages.destroy');
    Route::post('/messages/{id}/block', [AdminController::class, 'blockMessageSender'])->name('messages.block');
});
