<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
	/**
	 * Run the migrations.
	 */
	public function up(): void
	{
		Schema::create('statistics', function (Blueprint $table) {
			$table->id();
			$table->json('location');
			$table->string('code')->unique();
			$table->integer('new_cases');
			$table->integer('recovered');
			$table->integer('critical');
			$table->integer('deaths');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 */
	public function down(): void
	{
		Schema::dropIfExists('statistics');
	}
};
