<?php

use Illuminate\Support\Facades\Request;

if (!function_exists('admin_route')) {
    /**
     * Generate an administrative route URL with automatic support for subfolders (/demo/admin or /admin).
     */
    function admin_route(string $name, mixed $parameters = [], bool $absolute = true): string
    {
        $prefix = Request::is('demo*') ? 'demo.admin.' : 'admin.';
        return route($prefix . $name, $parameters, $absolute);
    }
}

if (!function_exists('is_admin_active')) {
    /**
     * Determine if an admin route is active for sidebar highlighting.
     */
    function is_admin_active(string|array $patterns): bool
    {
        $patterns = (array) $patterns;
        foreach ($patterns as $pattern) {
            if (Request::routeIs('admin.' . $pattern) || Request::routeIs('demo.admin.' . $pattern)) {
                return true;
            }
        }
        return false;
    }
}
