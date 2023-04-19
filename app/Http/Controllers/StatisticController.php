<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class StatisticController extends Controller
{
	public function worldwide(): View
	{
		return view('dashboard.worldwide');
	}

	public function byCountry()
	{
		return view('dashboard.list');
	}
}
