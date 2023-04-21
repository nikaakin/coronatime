<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\LocalizationController;
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

Route::middleware('auth', 'verified')->group(function () {
	Route::get('/', [StatisticController::class, 'worldwide'])->name('home');
	Route::get('/by-country', [StatisticController::class, 'byCountry'])->name('by_country');
});

Route::prefix('/login')->middleware('guest')->group(function () {
	Route::view('/', 'auth.login')->middleware('guest')->name('show_login');
	Route::post('/', [AuthController::class, 'login'])->name('login');
});

Route::get('/logout', [AuthController::class, 'logout'])->middleware('auth')->name('logout');

Route::prefix('signup')->group(function () {
	Route::view('/', 'auth.signup')->middleware('guest')->name('show_signup');
	Route::post('/', [AuthController::class, 'signup'])->middleware('guest')->name('signup');
});

Route::middleware('guest')->group(function () {
	Route::view('/forgot-password', 'auth.reset')->name('password.request');
	Route::post('/forgot-password', [AuthController::class, 'forgot'])->name('password.email');

	Route::get('/reset-password/{token}/{email}', [AuthController::class, 'reset_show'])->name('password.show_reset');
	Route::patch('/reset-password', [AuthController::class, 'reset'])->name('password.reset');
});

Route::view('/email/notice', 'auth.notice', ['message'=> __('auth.signup_notice')])->name('verification.notice');
Route::view('/email/notice-updated', 'auth.notice', ['message'=> __('auth.password_updated')])->name('verification.notice-updated');
Route::get('/email/verify/{id}/{hash},', [AuthController::class, 'verification'])->middleware('signed')->name('verification.verify');

Route::get('/locale/{locale}', [LocalizationController::class, 'switchLang'])->name('lang');
