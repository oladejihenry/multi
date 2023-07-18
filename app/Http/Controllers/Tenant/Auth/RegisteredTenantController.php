<?php

namespace App\Http\Controllers\Tenant\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RegisteredTenantController extends Controller
{
    public function create()
    {
        //
        return view('tenant.auth.register');
    }
}
