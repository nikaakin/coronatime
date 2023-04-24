<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Statistic>
 */
class StatisticFactory extends Factory
{
	/**
	 * Define the model's default state.
	 *
	 * @return array<string, mixed>
	 */
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
