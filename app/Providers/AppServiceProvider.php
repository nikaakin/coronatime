<?php

namespace App\Providers;

use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
	/**
	 * Register any application services.
	 */
	public function register(): void
	{
	}

	/**
	 * Bootstrap any application services.
	 */
	public function boot(): void
	{
		VerifyEmail::toMailUsing(function (object $notifiable, string $url) {
			return (new MailMessage)->view('auth.feedback', [
				'title'  => __('login.verify_email'),
				'hint'   => __('login.verify_email_hint'),
				'content'=> __('login.verify_email_button'),
				'href'   => $url,
			]);
		});
	}
}
