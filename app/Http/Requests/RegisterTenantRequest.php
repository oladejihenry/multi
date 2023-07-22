<?php

namespace App\Http\Requests;

use App\Models\User;
use App\Rules\UniqueEmailAndUsernameForTenant;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Validator as FacadesValidator;
use Illuminate\Validation\Rules;
use Illuminate\Validation\Rule;
use Stancl\Tenancy\Facades\Tenancy;
use Stancl\Tenancy\TenantScope;

class RegisterTenantRequest extends FormRequest
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
        // $tenant = tenant();
        return [
            'username' => ['required', 'alpha_dash', 'string', 'max:40', 'without_spaces'],
            'email' => ['required', 'string', 'email', 'max:255'],
            // 'email' => $tenant->unique('users'),

            'domain' => ['required', 'string', 'max:255', 'without_spaces', 'unique:domains'],
            'password' => ['required', Rules\Password::min(8)
                ->mixedCase()
                ->letters()
                ->numbers()
                ->symbols()],

        ];
    }

    public function prepareForValidation()
    {
        // dd($this->username);
        $this->merge([
            'domain' => $this->domain . '.' . config('tenancy.central_domains')[0],
        ]);
    }
}
