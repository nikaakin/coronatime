<?php

namespace Tests\Feature\Command;

use App\Console\Commands\FetchData;
use App\Models\Statistic;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Http;
use Tests\TestCase;

class FetchDataTest extends TestCase
{
	use RefreshDatabase;

	public function test_statistics_database_is_cleared_at_start()
	{
		$request = Http::get('https://devtest.ge/countries');
		$countries = json_decode($request->getBody()->getContents(), true);
		$size = sizeof($countries);
		$this->artisan(FetchData::class)->execute();
		$last = Statistic::all()->last();
		$this->assertEquals($last['code'], 'worldwide');
		$this->assertEquals(Statistic::all()->count(), $size + 1);
	}
}
