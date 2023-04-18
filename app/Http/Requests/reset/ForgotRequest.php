<?php

namespace App\Http\Requests\reset;

use Illuminate\Foundation\Http\FormRequest;

class ForgotRequest extends FormRequest
{
	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
	 */
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
