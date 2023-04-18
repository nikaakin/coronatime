<?php

namespace App\Http\Requests\reset;

use Illuminate\Foundation\Http\FormRequest;

class ResetRequest extends FormRequest
{
	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
	 */
	public function rules(): array
	{
		return [
			'password'             => 'confirmed|required|min:3',
			'password_confirmation'=> 'required',
			'token'                => '',
			'email'                => '',
		];
	}

	public function messages(): array
	{
		return [
			'password.required' => __('auth.password_required'),
			'password.confirmed'=> __('auth.password_confirmed'),
			'password.min'      => __('auth.password_min'),
		];
	}
}
