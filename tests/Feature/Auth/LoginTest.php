<?php

namespace Tests\Feature\Auth;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class LoginTest extends TestCase
{
	use RefreshDatabase;

	public function test_login_page_is_accessible()
	{
		$this->get('/locale/en');
		$response = $this->get('/login');

		$response->assertStatus(200);
		$response->assertSee('Log in');
		$response->assertViewIs('auth.login');
	}

	public function test_login_should_not_be_accessible_for_logged_in_user()
	{
		$user = User::factory()->create();
		$response = $this->actingAs($user)->get('login');

		$response->assertRedirectToRoute('home');
	}

	public function test_login_should_give_us_errors_if_input_is_not_provided()
	{
		$response = $this->post('login');

		$response->assertSessionHasErrors(['username', 'password']);
	}

	public function test_login_should_give_us_username_error_if_email_or_username_not_provided(): void
	{
		$response = $this->post('/login', ['password'=> fake()->password()]);

		$response->assertSessionHasErrors('username');
		$response->assertSessionDoesntHaveErrors('password');
	}

	public function test_login_should_give_us_error_if_provided_email_or_username_does_not_exist()
	{
		$this->get('/locale/en');
		$request = $this->post('/login', ['username'=>'THeGuyYouGoTo', 'password'=>'password']);

		$request->assertSessionHas(['error'=> 'wrong username or password']);
	}

	public function test_login_should_give_us_password_error_if_password_not_provided()
	{
		$response = $this->post('/login', ['username'=> fake()->userName()]);

		$response->assertSessionHasErrors('password');
		$response->assertSessionDoesntHaveErrors('username');
	}

	public function test_if_login_inputs_provided_correctly_it_should_redirect_to_dashboard()
	{
		User::factory()->create(['username'=> 'newuser', 'password'=> bcrypt('password')]);
		$request = $this->post('/login', ['username'=> 'newuser', 'password'=> 'password']);

		$request->assertRedirectToRoute('home');
	}

	public function test_if_login_inputs_provided_correctly_it_should_redirect_to_dashboard_with_remember()
	{
		User::factory()->create(['username'=> 'newuser@new.com', 'password'=> bcrypt('password')]);
		$request = $this->post('/login', ['username'=> 'newuser@new.com', 'password'=> 'password', 'remember'=> 'true']);

		$request->assertRedirectToRoute('home');
	}
}
