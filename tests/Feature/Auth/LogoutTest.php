<?php

namespace Tests\Feature\Auth;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class LogoutTest extends TestCase
{
	use RefreshDatabase;

	public function test_logout_route_redirects_to_login_page_for_guests()
	{
		$request = $this->get('/logout');

		$request->assertRedirectToRoute('login');
	}

	public function test_logout_route_redirects_to_login_page_for_logged_in_users()
	{
		$user = User::factory()->create(['username'=>'test', 'password'=>'1111']);
		$request = $this->actingAs($user)->get('/logout');

		$request->assertRedirectToRoute('login');
	}
}
