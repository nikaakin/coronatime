<?php

namespace App\Http\Requests\auth;

use Illuminate\Foundation\Http\FormRequest;

class SignupRequest extends FormRequest
{

	public function rules(): array
	{
		return [
			'email'                 => ['required', 'unique:users,email'],
			'username'              => ['required', 'min:3', 'unique:users,username'],
			'password'              => ['required', 'min:3', 'confirmed'],
			'password_confirmation' => ['required'],
		];
	}

	public function messages(): array
	{
		return  [
			'email.required'                 => __('auth.email_required'),
			'email.unique'                   => __('auth.email_unique'),
			'username.required'              => __('auth.username_required'),
			'username.min'                   => __('auth.username_min'),
			'username.unique'                => __('auth.username_unique'),
			'password.required'              => __('auth.password_required'),
			'password.min'                   => __('auth.password_min'),
			'password.confirmed'             => __('auth.password_confirmed'),
			'password_confirmation.required' => __('auth.repeat_required'),
		];
	}
}
