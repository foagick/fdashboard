<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

use App\Http\Controllers\DashboardController;

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

// API endpoint for dashboard mock data
Route::get('/api/dashboard/mock', [DashboardController::class, 'data']);
