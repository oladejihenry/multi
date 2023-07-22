<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Validator as FacadesValidator;
use Illuminate\Validation\Rules;
use Illuminate\Validation\Rule;

class StoreTenantRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        FacadesValidator::extend('without_spaces', function ($attr, $value) {
            return preg_match('/^\S*$/u', $value);
        });

        return [
            'username' => ['required', 'alpha_dash', 'string', 'max:40', 'without_spaces'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],

            'password' => ['required', Rules\Password::min(8)
                ->mixedCase()
                ->letters()
                ->numbers()
                ->symbols()],

            'username.without_spaces' => 'Whitespace not allowed.'
        ];
    }
}
