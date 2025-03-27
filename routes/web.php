<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
// Route::get('/check-score', [ScoreController::class, 'showCheckScoreForm'])->name('check.score.form');
Route::get('/check-score', [ScoreController::class, 'checkScore'])->name('check.score');
Route::get('/report', [ScoreController::class, 'report'])->name('scores.report');
Route::get('/top-group-a', [ScoreController::class, 'topGroupA'])->name('scores.top_group_a');