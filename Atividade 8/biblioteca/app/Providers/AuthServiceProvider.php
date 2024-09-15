<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\Models\Book;
use App\Models\User;
use App\Policies\BookPolicy;
use App\Policies\RolePolicy;

class AuthServiceProvider extends ServiceProvider
{
    protected $policies = [
        Book::class => BookPolicy::class,
        User::class => RolePolicy::class,
    ];

    public function boot()
    {
        $this->registerPolicies();
    }
}
