<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\StatisticController;
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

Route::get('/', [StatisticController::class, 'worldwide'])->middleware('auth')->name('home');
Route::view('/login', 'auth.login')->middleware('guest')->name('show_login');
Route::post('/login', [AuthController::class, 'login'])->middleware('guest')->name('login');
Route::get('/logout', [AuthController::class, 'logout'])->middleware('auth')->name('logout');
Route::view('/signup', 'auth.signup')->middleware('guest')->name('show_signup');
Route::post('/signup', [AuthController::class, 'signup'])->middleware('guest')->name('signup');
Route::view('/forgot-password', 'auth.reset')->name('show_forgot');
Route::post('/forgot-password', [AuthController::class, 'forgot'])->name('forgot');
Route::view('/reset-password', 'auth.set-new-password')->name('show_reset');
Route::post('/reset-password', [AuthController::class, 'reset'])->name('reset');
