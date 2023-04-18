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

Route::get('/', [StatisticController::class, 'worldwide'])->middleware('auth', 'verified')->name('home');

Route::view('/login', 'auth.login')->middleware('guest')->name('show_login');
Route::post('/login', [AuthController::class, 'login'])->middleware('guest')->name('login');
Route::get('/logout', [AuthController::class, 'logout'])->middleware('auth')->name('logout');
Route::view('/signup', 'auth.signup')->middleware('guest')->name('show_signup');
Route::post('/signup', [AuthController::class, 'signup'])->middleware('guest')->name('signup');

Route::view('/forgot-password', 'auth.reset')->middleware('guest')->name('password.request');
Route::post('/forgot-password', [AuthController::class, 'forgot'])->name('password.email');
Route::get('/reset-password/{token}/{email}', [AuthController::class, 'reset_show'])->name('password.show_reset');
Route::patch('/reset-password', [AuthController::class, 'reset'])->name('password.reset');

Route::view('/email/notice', 'auth.notice', ['message'=> __('auth.signup_notice')])->name('verification.notice');
Route::view('/email/notice-updated', 'auth.notice', ['message'=> __('auth.password_updated')])->name('verification.notice-updated');
Route::get('/email/verify/{id}/{hash},', [AuthController::class, 'verification'])->middleware('signed')->name('verification.verify');

Route::view('/test', 'auth.feedback', [
	'title'  => __('login.verify_email'),
	'hint'   => __('login.verify_email_hint'),
	'content'=> __('login.verify_email_button'),
	'href'   => '#',
]);
