<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class localization
{

	public function handle(Request $request, Closure $next): Response
	{
		if (session()->has('locale')) {
			app()->setLocale(session()->get('locale'));
		} else {
			app()->setLocale('en');
		}
		return $next($request);
	}
}
