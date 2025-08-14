<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Pendaftaran\FilePersyaratanController;
use App\Http\Controllers\MasterData\PersyaratanController;
use App\Http\Controllers\Pendaftaran\DaftarPendaftaranController;
use App\Http\Controllers\Pendaftaran\FormPendaftaranController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// 🏠 Dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

// 📄 Persyaratan
Route::resource('persyaratan', PersyaratanController::class);
Route::get('/persyaratan/data', [PersyaratanController::class, 'getAll']);

// 📋 Formulir Pendaftaran
Route::resource('form-pendaftaran', FormPendaftaranController::class);

// 📝 Daftar Pendaftaran — CUKUP SATU INI
Route::resource('daftar-pendaftaran', DaftarPendaftaranController::class);

// Route::get('file-persyaratan/{id}', FilePersyaratanController::class, 'index');
Route::get('/file-persyaratan/{id}', [FilePersyaratanController::class, 'index'])->name('file-persyaratan.show');
