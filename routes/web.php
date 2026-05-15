<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OutilAIController;

Route::get('/', function () {
    return view('welcome');
});

// Resource route for AI Tools with authentication middleware
Route::resource('outils', OutilAIController::class)->middleware('auth');
