<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class StatisticFactory extends Factory
{
	public function definition(): array
	{
		return [
			'location'               => ['en'=> fake()->country(), 'ka'=>fake()->country()],
			'code'                   => fake()->countryCode(),
			'new_cases'              => fake()->numberBetween(100, 10000),
			'recovered'              => fake()->numberBetween(100, 10000),
			'critical'               => fake()->numberBetween(100, 10000),
			'deaths'                 => fake()->numberBetween(100, 10000),
		];
	}
}
