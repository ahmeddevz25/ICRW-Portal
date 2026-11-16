<?php

namespace App\Providers;

require_once app_path('Helpers/helpers.php');

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Auth;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Custom RBAC Blade Directives
        Blade::if('hasrole', function (string|array $roles) {
            return Auth::check() && Auth::user()->hasRole($roles);
        });

        Blade::if('can_perm', function (string $permission) {
            return Auth::check() && Auth::user()->hasPermission($permission);
        });
    }
}
