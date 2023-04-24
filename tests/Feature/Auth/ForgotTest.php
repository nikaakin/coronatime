<?php

namespace Tests\Feature\Auth;

use App\Mail\AuthMail;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;

class ForgotTest extends TestCase
{
	use RefreshDatabase;

	public function test_reset_page_can_be_accesses_by_guest()
	{
		$request = $this->get('/forgot-password');

		$request->assertViewIs('auth.reset');
	}

	public function test_reset_returns_email_error_if_email_not_provided()
	{
		$request = $this->post('/forgot-password');

		$request->assertSessionHasErrors('email');
	}

	public function test_reset_returns_email_error_if_email_not_valid()
	{
		$request = $this->post('/forgot-password', ['email' => 'not-an-email']);

		$request->assertSessionHasErrors('email');
	}

	public function test_reset_makes_reset_token_and_puts_in_DB_if_email_exists()
	{
		$user = User::factory()->create(['email' => 'test@example.com']);
		$request = $this->post('/forgot-password', ['email' => $user->email]);

		$request->assertSessionHasNoErrors();
		$this->assertDatabaseHas('password_reset_tokens', ['email' => $user->email]);
	}

	public function test_password_reset_mail_is_sent_and_redirected_to_notice_page()
	{
		Mail::fake();
		$user = User::factory()->create(['email' => 'test@example.com']);
		$request = $this->post('/forgot-password', ['email' => $user->email]);

		Mail::assertSent(AuthMail::class, function (AuthMail $mail) use ($user) {
			return $mail->assertTo('test@example.com');
		});

		$request->assertRedirectToRoute('verification.notice');
	}
}
