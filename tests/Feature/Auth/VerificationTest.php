<?php

namespace Tests\Feature\Auth;

use App\Http\Middleware\ValidateSignature;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Event;
use Tests\TestCase;

class VerificationTest extends TestCase
{
	use RefreshDatabase;

	public function test_successful_verification_redirects_verification_notice()
	{
		$this->withoutMiddleware(ValidateSignature::class);
		Event::fake();
		$user = User::factory()->create(['username'=>'test', 'email'=> 'test@example.com', 'password'=>bcrypt('1111')]);

		$event = new Registered($user);
		Event::dispatch($event);

		$request = $this->actingAs($user)
		->get(('/email/verify/' . $user->id . '/' . sha1($user->email) . ',?expires=1682196536&'));

		$request->assertViewIs('auth.notice');
	}

	public function test_unsuccessful_verification_returns_error_page()
	{
		$this->withoutMiddleware(ValidateSignature::class);
		Event::fake();
		$user = User::factory()->create(['username'=>'test', 'email'=> 'test@example.com', 'password'=>bcrypt('1111')]);

		$event = new Registered($user);
		Event::dispatch($event);

		$request = $this->actingAs($user)
		->get(('/email/verify/' . $event->user->id . '/' . 'test' . ',?expires=1682196536&'));

		$request->assertStatus(403);
	}
}
