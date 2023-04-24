<?php

namespace Tests\Feature\Auth;

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Event;
use Tests\TestCase;

class SignupTest extends TestCase
{
	use  RefreshDatabase;

	public function test_signup_is_accessible_for_guests()
	{
		$request = $this->get('/signup');

		$request->assertOk();
	}

	public function test_signup_is_not_accessible_for_logged_in_user()
	{
		$user = User::factory()->create(['username'=> 'test', 'email'=> 'test@example.com', 'password'=> '111']);
		$request = $this->actingAs($user)->get('/signup');

		$request->assertRedirectToRoute('home');
	}

	public function test_signup_returns_errors_if_no_input_provided_()
	{
		$response = $this->post('/signup', []);

		$response->assertSessionHasErrors(['email', 'username', 'password', 'password_confirmation']);
	}

	public function test_signup_returns_errors_and_mail_is_not_sent_if_inputs_are_only_partially_provided()
	{
		Event::fake();
		$request = $this->post('/signup', ['username'=>'test', 'password'=> 'test']);

		$request->assertSessionHasErrors(['email', 'password_confirmation']);
		Event::assertNotDispatched(Registered::class);
	}

	public function test_signup_sends_email_and_redirects_to_email_verification_notice_page_after_succesful_sign_up()
	{
		Event::fake();
		$request = $this->post('/signup', ['username'=> 'test', 'email'=> 'test@example.com', 'password'=> '111', 'password_confirmation'=> '111']);

		$request->assertRedirectToRoute('verification.notice');
		Event::hasDispatched(Registered::class);
	}
}
