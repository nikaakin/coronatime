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
		$sortParams = $request->query();

		$countries = Statistic::search($request->input('query'))->get();
		$countries = $countries->where('code', '!=', 'worldwide');

		foreach ($sortParams as $key => $value) {
			if ($value == 'asc') {
				$countries = $countries->sortBy($key)->values();
			} elseif ($value == 'desc') {
				$countries = $countries->sortByDesc($key)->values();
			}
		}
		return view('dashboard.list', ['countries' =>[$worldwide, ...$countries]]);
	}
}
