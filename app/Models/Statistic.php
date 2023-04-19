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
		'name'=> 'array',
	];

	public $translatable = ['name'];

	protected $guarded = ['id'];
}
