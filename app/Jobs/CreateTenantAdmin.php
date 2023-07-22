<?php

namespace App\Jobs;

use App\Http\Requests\RegisterTenantRequest;
use App\Http\Requests\StoreTenantRequest;
use App\Models\Tenant;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class CreateTenantAdmin implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct(public Tenant $tenant)
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        // if (!isset($this->tenant->password)) {
        //     throw new \InvalidArgumentException("Password and password_confirmation fields are missing.");
        // }
        // $storeTenantRequest = new StoreTenantRequest();

        // dd($this->tenant->username);

        // dd($storeTenantRequest);

        // $rules = [
        //     'username' => ['required', 'string', 'max:255'],
        //     'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
        //     'password' => ['required', 'string', 'min:8'],
        // ];

        // $validator = Validator::make([
        //     'username' => $this->tenant->username, // You can pass the tenant's username directly.
        //     'email' => $this->tenant->email,
        //     'password' => $this->tenant->password,
        //     // 'password_confirmation' => $this->tenant->password_confirmation, // Assuming you have a password_confirmation field.
        // ], $rules);
        // dd($validatedData);
        $this->tenant->run(function ($tenant) {
            User::create($tenant->only('username', 'email', 'password'));
        });

        // if ($validator->fails()) {
        //     // Handle validation errors as needed (e.g., log errors, throw an exception).
        //     // For example:
        //     throw new \InvalidArgumentException($validator->errors()->first());
        // }


        // $this->tenant->run(function ($tenant) {
        //     User::create([
        //         'username' => $this->tenant->username,
        //         'email' => $this->tenant->email,
        //         'password' => $this->tenant->password,
        //     ]);
        // });
    }
}
