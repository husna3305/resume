<?php

use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [WelcomeController::class, 'index'])->name('index');
Route::get('/cv', [WelcomeController::class, 'cv'])->name('cv');
