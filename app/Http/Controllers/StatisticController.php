<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class StatisticController extends Controller
{
	public function worldwide(): View
	{
		return view('statistic.worldwide');
	}

	public function byCountry()
	{
		return view('statistic.by-country');
	}
}
