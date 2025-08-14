<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\LandingPageController;
use Illuminate\Support\Facades\Route;


Route::get('login-page', [LoginController::class, 'index']);
Route::get('landing-page', [LandingPageController::class, 'index']);
Route::post('/login', [LoginController::class, 'authenticate'])->name('authenticate');
 Route::post('/logout', [LoginController::class, 'logout'])->name('logout');