<?php

namespace App\Models;

use Stancl\Tenancy\Database\Models\Tenant as BaseTenant;
use Stancl\Tenancy\Contracts\TenantWithDatabase;
use Stancl\Tenancy\Database\Concerns\HasDatabase;
use Stancl\Tenancy\Database\Concerns\HasDomains;
use Stancl\Tenancy\Database\Concerns\HasScopedValidationRules;

class Tenant extends BaseTenant implements TenantWithDatabase
{
    use HasDatabase, HasDomains, HasScopedValidationRules;

    // protected $guarded = [];

    // public function users()
    // {
    //     return $this->hasMany(User::class);
    // }

    public static function booted()
    {
        static::creating(function ($tenant) {
            $tenant->password = bcrypt($tenant->password);
        });
    }
}
