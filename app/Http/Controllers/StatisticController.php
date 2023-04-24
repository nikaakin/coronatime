<?php

namespace App\Http\Controllers;

use App\Models\Statistic;
use Illuminate\Http\Request;
use Illuminate\View\View;

class StatisticController extends Controller
{
	public function worldwide(): View
	{
		$data = Statistic::firstWhere('code', 'worldwide');
		return view('dashboard.worldwide', $data);
	}

	public function byCountry(Request $request): View
	{
		$worldwide = Statistic::firstWhere('code', 'worldwide');
		$countries = Statistic::all()->map(fn ($country) =>$country)->slice(1, -1);
		$sortByParams = $request->query();

		$outputCountries = [$worldwide, ...$countries];

		if ($request->has('query')) {
			$found = $countries->firstWhere('name', 'ilike', $request->input('query'));
			if ($found === null) {
				$outputCountries = [$worldwide];
			} else {
				dd($found);
				$outputCountries = [$worldwide, $found];
			}
		} else {
			foreach ($sortByParams as $key => $value) {
				if ($value == 'asc') {
					$countries = $countries->sortBy($key)->values();
				} elseif ($value == 'desc') {
					$countries = $countries->sortByDesc($key)->values();
				}
			}
			$outputCountries = [$worldwide, ...$countries];
		}

		return view('dashboard.list', ['countries' =>$outputCountries]);
	}
}
