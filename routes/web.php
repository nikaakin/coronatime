<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\LocalizationController;
use App\Http\Controllers\StatisticController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {
	Route::get('/logout', [AuthController::class, 'logout'])->middleware('auth')->name('logout');

	Route::middleware('verified')->controller(StatisticController::class)->group(function () {
		Route::get('/', 'worldwide')->name('home');
		Route::get('/by-country', 'byCountry')->name('by_country');
	});
});

Route::middleware('guest')->group(function () {
	Route::view('/forgot-password', 'auth.reset')->name('password.request');
	Route::controller(AuthController::class)->group(function () {
		Route::post('/forgot-password', [AuthController::class, 'forgot'])->name('password.email');

		Route::get('/reset-password/{token}/{email}', [AuthController::class, 'reset_show'])->name('password.show_reset');
		Route::patch('/reset-password', [AuthController::class, 'reset'])->name('password.reset');
	});

	Route::prefix('/login')->group(function () {
		Route::view('/', 'auth.login')->name('show_login');
		Route::post('/', [AuthController::class, 'login'])->name('login');
	});

	Route::prefix('signup')->group(function () {
		Route::view('/', 'auth.signup')->middleware('guest')->name('show_signup');
		Route::post('/', [AuthController::class, 'signup'])->middleware('guest')->name('signup');
	});
});

Route::prefix('/email')->group(function () {
	Route::view('/notice', 'auth.notice', ['message'=> __('auth.signup_notice')])->name('verification.notice');
	Route::view('/notice-updated', 'auth.notice', ['message'=> __('auth.password_updated')])->name('verification.notice-updated');
	Route::get('/verify/{id}/{hash},', [AuthController::class, 'verification'])->middleware('signed')->name('verification.verify');
});

Route::get('/locale/{locale}', [LocalizationController::class, 'switchLang'])->name('lang');
