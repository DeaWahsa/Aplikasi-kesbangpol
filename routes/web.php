<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MasterData\PersyaratanController;
use Illuminate\Support\Facades\Route;
// use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [DashboardController::class, 'index'])->name('home')->middleware(('guest'));

Route::resource('persyaratan', PersyaratanController::class);

Route::post('add-persyaratan', [PersyaratanController::class, 'store'])->name('persyaratan.store');

Route::delete('/persyaratan/{id}', [PersyaratanController::class, 'destroy']);


// Route::get('/', function () {
//     return view('dashboard');
// });
