<?php

namespace Tests\Feature;

use App\Models\Statistic;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class StatisticTest extends TestCase
{
	use RefreshDatabase;

	public function test_worlwide_page_is_not_accessible_for_guests()
	{
		$response = $this->get('/');
		$response->assertRedirectToRoute('login');
	}

	public function test_by_country_page_is_not_accessible_for_guests()
	{
		$response = $this->get('/by-country');
		$response->assertRedirectToRoute('login');
	}

	public function test_worldwide_page_is_accessible_for_logged_in_user()
	{
		Statistic::factory()->create(['code'=>'worldwide']);
		$user = User::factory()->create();
		$request = $this->actingAs($user)->get('/');

		$request->assertOk();
	}

	public function test_by_country_page_is_accessible_for_logged_in_user_without_queries()
	{
		$worldwide = Statistic::factory()->create(['code'=>'worldwide'])->first();
		Statistic::factory()->create(['code'=>'first']);
		Statistic::factory()->create(['code'=>'second']);
		$user = User::factory()->create();

		$countries = Statistic::all()->map(fn ($country) =>$country)->slice(1, -1);

		$request = $this->actingAs($user)->get('/by-country');
		$request->assertOk();
		$this->assertEquals($worldwide->code, $request['countries'][0]['code']);
		$this->assertEquals($countries->first()->code, $request['countries'][1]['code']);
	}

	public function test_by_country_page_is_accessible_for_logged_in_user_with_queries()
	{
		$worldwide = Statistic::factory()->create(['code'=>'worldwide'])->first();
		Statistic::factory()->create(['code'=>'first']);
		Statistic::factory()->create(['code'=>'second']);
		$user = User::factory()->create();

		$countries = Statistic::all()->map(fn ($country) =>$country)->slice(1, -1);

		$countries = $countries->sortBy('location')->values();

		$request = $this->actingAs($user)->get('/by-country?location=asc');

		$countries = $countries->sortByDesc('deaths')->values();

		$request = $this->actingAs($user)->get('/by-country?deaths=desc');
		$request->assertOk();
		$this->assertEquals($worldwide->code, $request['countries'][0]['code']);
		$this->assertEquals($countries->first()->code, $request['countries'][1]['code']);
	}
}
