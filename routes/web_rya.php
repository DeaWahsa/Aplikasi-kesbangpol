<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\LandingPageController;
use Illuminate\Support\Facades\Route;


Route::get('login-page', [LoginController::class, 'index'])->name('home')->middleware('guest');
Route::get('/', [LandingPageController::class, 'index'])->name('home')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate'])->name('authenticate');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
