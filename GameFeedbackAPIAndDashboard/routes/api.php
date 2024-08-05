<?php

use App\Http\Controllers\GameController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FeedbackController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/games', [GameController::class, 'index']);
Route::get('/feedbackList', [FeedbackController::class, 'index']);
Route::post('/feedback', [FeedbackController::class, 'store']) ;
