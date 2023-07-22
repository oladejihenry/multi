<?php

namespace App\Http\Controllers\Tenant\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterTenantRequest;
use App\Models\Tenant;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class RegisteredTenantController extends Controller
{
    public function create()
    {
        return view('tenant.auth.register');
    }

    public function store(RegisterTenantRequest $request)
    {
        $tenant = Tenant::create($request->validated());
        $tenant->createDomain(['domain' => $request->domain]);
    }
}
