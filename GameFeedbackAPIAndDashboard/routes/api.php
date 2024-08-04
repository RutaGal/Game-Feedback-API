<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FeedbackController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/games', [FeedbackController::class, 'index']);
Route::post('/feedback', [FeedbackController::class, 'store']) ;
