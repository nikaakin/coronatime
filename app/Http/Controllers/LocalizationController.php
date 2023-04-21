<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;

class LocalizationController extends Controller
{
	public function switchLang(string $locale): RedirectResponse
	{
		if (in_array($locale, config('app.available_locales'))) {
			app()->setLocale($locale);
			session()->put('locale', $locale);
		} else {
			app()->setLocale('en');
		}
		return back();
	}
}
