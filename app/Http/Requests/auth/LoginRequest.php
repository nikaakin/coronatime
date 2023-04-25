<?php

namespace App\Http\Requests\auth;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{

	public function rules(): array
	{
		return [
			'username'    => ['required', 'min:3'],
			'password'    => ['required'],
			'remember'    => '',
		];
	}

	public function messages(): array
	{
		return [
			'username.required'    => __('auth.username_email_required'),
			'username.min'         => __('auth.username_min'),
			'password.required'    => __('auth.password_required'),
		];
	}
}
