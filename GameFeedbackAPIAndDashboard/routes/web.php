<?php

use App\Http\Controllers\FeedbackController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/games', [FeedbackController::class, 'index']);
Route::post('/feedback', [FeedbackController::class, 'store']) ;
