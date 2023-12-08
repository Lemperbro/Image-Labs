<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UpResFeatureController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/features', [DashboardController::class, 'Features'])->name('dashboard.features');

//features

//upResolusi
Route::get('/features/UpResolusi', [UpResFeatureController::class, 'index'])->name('upresolusi');
Route::post('/features/UpResolusi', [UpResFeatureController::class, 'proses'])->name('upresolusi.post');
Route::get('/features/UpResolusi/cancel', [UpResFeatureController::class, 'cancel'])->name('upresolusi.cancel');
