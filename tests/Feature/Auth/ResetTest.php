<?php

namespace Tests\Feature\Auth;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;
use Illuminate\Support\Str;

class ResetTest extends TestCase
{
	use RefreshDatabase;

	public string $token;

	public User $user;

	public function setUp(): void
	{
		parent::setUp();
		$this->token = Str::random(64);
		$this->user = User::factory()->create(['email'=> 'test@example.com']);
	}

	public function test_reset_page_is_accessible_by_guests()
	{
		$request = $this->get('/reset-password/token/email');

		$request->assertOk();
	}

	public function test_reset_page_redirects_if_provided_email_does_not_have_reset_token_in_db()
	{
		$request = $this->patch(
			'/reset-password',
			['email'=> 'test@example.com', 'password' => 'pass', 'password_confirmation'=> 'pass', 'token'=> $this->token]
		);

		$request->assertRedirectToRoute('show_login');
	}

	public function test_reset_page_redirects_if_invalid_token_is_provided()
	{
		DB::table('password_reset_tokens')
		->updateOrInsert(['email'=> 'test@example.com', 'token'=> 'another-token', 'created_at'=> now()]);

		$request = $this->patch(
			'/reset-password',
			['email'=> 'test@example.com', 'password' => 'pass', 'password_confirmation'=> 'pass', 'token'=> $this->token]
		);

		$request->assertRedirectToRoute('show_login');
	}

	public function test_reset_request_return_errors_if_inputs_not_provided()
	{
		$request = $this->patch('/reset-password');

		$request->assertSessionHasErrors(['password', 'password_confirmation', 'email', 'token']);
	}

	public function test_reset_returns_some_errors_if_inputs_partially_provided()
	{
		$request = $this->patch('/reset-password', ['email'=> 'new@new.com', 'token'=>'222222222222']);

		$request->assertSessionHasErrors(['password', 'password_confirmation']);
	}

	public function test_reset_post_request_resets_password_if_valid_email_and_token_provided()
	{
		DB::table('password_reset_tokens')
		->updateOrInsert(['email'=> 'test@example.com', 'token'=> $this->token, 'created_at'=> now()]);

		$this->patch(
			'/reset-password',
			['email'=> 'test@example.com', 'password' => 'pass', 'password_confirmation'=> 'pass', 'token'=> $this->token]
		);
		$this->assertTrue(Hash::check('pass', $this->user->refresh()->password));
	}

	public function test_reset_post_request_deletes_reset_token_from_db_if_valid_email_and_token_provided()
	{
		DB::table('password_reset_tokens')
		->updateOrInsert(['email'=> 'test@example.com', 'token'=> $this->token, 'created_at'=> now()]);

		$this->patch(
			'/reset-password',
			['email'=> 'test@example.com', 'password' => 'pass', 'password_confirmation'=> 'pass', 'token'=> $this->token]
		);
		$this->assertDatabaseMissing('password_reset_tokens', ['email'=> 'test@example.com']);
	}

	public function test_reset_post_request_redirects_to_update_notice_valid_email_and_token_provided()
	{
		DB::table('password_reset_tokens')
		->updateOrInsert(['email'=> 'test@example.com', 'token'=> $this->token, 'created_at'=> now()]);

		$request = $this->patch(
			'/reset-password',
			['email'=> 'test@example.com', 'password' => 'pass', 'password_confirmation'=> 'pass', 'token'=> $this->token]
		);

		$request->assertRedirectToRoute('verification.notice-updated');
	}
}
