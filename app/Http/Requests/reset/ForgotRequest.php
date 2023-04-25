<?php

namespace App\Http\Requests\reset;

use Illuminate\Foundation\Http\FormRequest;

class ForgotRequest extends FormRequest
{

	public function rules(): array
	{
		return [
			'email'=> ['required', 'email', 'exists:users,email'],
		];
	}

	public function messages(): array
	{
		return [
			'email.required' => __('auth.email_required'),
			'email.email'    => __('auth.email_required'),
			'email.exists'   => __('auth.email_exists'),
		];
	}
}
