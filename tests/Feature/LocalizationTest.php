<?php

namespace Tests\Feature;

use Tests\TestCase;

class LocalizationTest extends TestCase
{
	public function test_changing_locale_with_existing_different_locale_will_change_app_locale_property(): void
	{
		$oldLocale = app()->currentLocale();
		$this->get('locale/ka');
		$newLocale = app()->currentLocale();

		$this->assertNotEquals($oldLocale, $newLocale);
	}

	public function test_changing_locale_with_invalid_locale_will_change_app_locale_to_default(): void
	{
		$oldLocale = app()->currentLocale();
		$this->get('locale/ge');
		$newLocale = app()->currentLocale();

		$this->assertEquals($oldLocale, $newLocale);
	}

	public function test_changing_locale_with_same_locale_will_not_change_app_locale(): void
	{
		$oldLocale = app()->currentLocale();
		$this->get('locale/en');
		$newLocale = app()->currentLocale();

		$this->assertEquals($oldLocale, $newLocale);
	}
}
