<?php

namespace App\Http\Controllers;

use App\Http\Requests\auth\LoginRequest;
use App\Http\Requests\auth\SignupRequest;
use App\Http\Requests\reset\ForgotRequest;
use App\Http\Requests\reset\ResetRequest;
use App\Mail\AuthMail;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\View\View;

class AuthController extends Controller
{
	public function login(LoginRequest $request): RedirectResponse
	{
		$data = $request->validated();
		unset($data['remember']);
		if (str_contains($data['username'], '@')) {
			$data['email'] = $data['username'];
			unset($data['username']);
		}
		$remember_me = $request->has('remember') ? true : false;

		if (auth()->attempt($data, $remember_me)) {
			return redirect()->route('home');
		}
		return redirect()->back()->with('error', __('auth.wrong_credentials'));
	}

	public function logout(): RedirectResponse
	{
		auth()->logout();
		return redirect()->route('login');
	}

	public function signup(SignupRequest $request)
	{
		$data = $request->validated();

		$data['password'] = bcrypt($data['password']);
		$user = User::create($data);
		auth()->login($user);
		event(new Registered($user));
		return redirect()->route('verification.notice');
	}

	public function verification(EmailVerificationRequest $request)
	{
		$request->fulfill();
		auth()->logout();
		return view('auth.notice', ['message' => __('auth.account_confirmed')]);
	}

	public function forgot(ForgotRequest $request)
	{
		$data = $request->validated();
		$token = Str::random(64);

		DB::table('password_reset_tokens')->updateOrInsert(
			['email'=> $data['email']],
			[
				'token'      => $token,
				'created_at' => now(),
			]
		);

		Mail::to(User::where(['email'=>$data['email']])->first())
		->send(
			new AuthMail(
				__('login.recover_password'),
				__('login.recover_password_hint'),
				route('password.show_reset', ['token' => $token, 'email'=> $data['email']]),
				__('login.recover_password_button')
			)
		);

		return redirect()->route('verification.notice');
	}

	public function reset_show(string $token, string $email): View
	{
		return view('auth.set-new-password', ['token'=> $token, 'email'=> $email]);
	}

	public function reset(ResetRequest $request): RedirectResponse
	{
		$data = $request->validated();
		$token = DB::table('password_reset_tokens')->where('email', '=', $data['email'])->first();

		if (!($token->token === $data['token'])) {
			return redirect()->route('show_login');
		}

		User::where('email', '=', $data['email'])->update([
			'password'=> bcrypt($data['password']),
		]);

		return redirect()->route('verification.notice-updated');
	}
}
