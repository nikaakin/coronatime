<?php

namespace App\Console\Commands;

use App\Models\Statistic;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class FetchData extends Command
{
	protected $signature = 'coronatime:fetch-data';

	protected $description = 'fetches Covid statistics';

	public function handle()
	{
		$request = Http::get('https://devtest.ge/countries');
		DB::table('statistics')->truncate();
		$worldwide = [
			'location'     => [
				'en'=> 'worldwide',
				'ka'=> 'მსოფლიოში',
			],
			'code'     => 'worldwide',
			'new_cases'=> 0,
			'recovered'=> 0,
			'critical' => 0,
			'deaths'   => 0,
		];

		$countries = json_decode($request->getBody()->getContents(), true);

		foreach ($countries as $country) {
			$request = Http::post('https://devtest.ge/get-country-statistics', ['code'=> $country['code']]);
			$data = json_decode($request->getBody()->getContents(), true);

			$worldwide['new_cases'] += $data['confirmed'];
			$worldwide['deaths'] += $data['deaths'];
			$worldwide['critical'] += $data['critical'];
			$worldwide['recovered'] += $data['recovered'];
			Statistic::create([
				'location'     => $country['name'],
				'code'         => $country['code'],
				'new_cases'    => $data['confirmed'],
				'recovered'    => $data['recovered'],
				'critical'     => $data['critical'],
				'deaths'       => $data['deaths'],
			]);
		}

		Statistic::create($worldwide);
	}
}
