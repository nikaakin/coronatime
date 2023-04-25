<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Statistic extends Model
{
	use HasFactory;

	use HasTranslations;

	protected $casts = [
		'location'=> 'array',
	];

	public $translatable = ['location'];

	protected $guarded = ['id'];

	public function scopeSearch($query, string|null $searchQuery)
	{
		if (empty($searchQuery)) {
			return $query;
		}

		return $query->where(function ($query) use ($searchQuery) {
			$query->WhereRaw('LOWER(JSON_EXTRACT(location, "$.en")) like ?', ["%$searchQuery%"])
				->orWhereRaw('LOWER(JSON_EXTRACT(location, "$.ka")) like ?', ["%$searchQuery%"]);
		});
	}
}
