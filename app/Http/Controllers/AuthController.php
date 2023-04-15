<?php

namespace App\Http\Controllers;

use App\Http\Requests\auth\LoginRequest;
use App\Http\Requests\auth\SignupRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;

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
		return redirect()->route('home');
	}
}
