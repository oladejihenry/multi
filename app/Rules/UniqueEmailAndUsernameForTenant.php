<?php

namespace App\Rules;

use App\Models\User;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Validation\Concerns\ValidatesAttributes;
use Illuminate\Support\Facades\DB;

class UniqueEmailAndUsernameForTenant implements Rule
{
    use ValidatesAttributes;

    protected $userId; // Store the current user's ID

    public function __construct($userId = null)
    {
        $this->userId = $userId;
    }

    public function passes($attribute, $value)
    {
        // Check if the email is unique within the current tenant's scope
        $tenant = tenant(); // Assuming you have a helper function to get the current tenant
        if (!$tenant) {
            // Log the error or add a debug statement
            \Log::error('Tenant is null while trying to validate unique email.');
            return false;
        }

        // Prepare data for validation
        $data = [
            'email' => $value,
            'tenant_id' => $tenant->id,
        ];

        // Add the current user ID to the data when updating
        if (!empty($this->userId)) {
            $data['id'] = $this->userId;
        }

        // Define validation rules
        $rules = [
            'email' => [
                'required',
                'email',
                // Validate unique email based on tenant scope and current user (if updating)
                function ($attribute, $value, $fail) use ($data) {
                    $query = User::where('email', $value)->where('tenant_id', $data['tenant_id']);
                    if (isset($data['id'])) {
                        $query->where('id', '!=', $data['id']);
                    }

                    if ($query->exists()) {
                        $fail('The email address must be unique within your tenant.');
                    }
                },
            ],
        ];

        // Validate the data using the custom rule
        $validator = Validator::make($data, $rules);
        return !$validator->fails();
    }

    public function message()
    {
        return 'The email address must be unique within your tenant.';
    }
}
