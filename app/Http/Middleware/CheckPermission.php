<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckPermission
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next, string $permission): Response
    {
        if (!Auth::check()) {
            return redirect()->route('admin.login');
        }

        $user = Auth::user();

        if (!$user->hasPermission($permission)) {
            if ($request->expectsJson()) {
                return response()->json(['error' => 'Unauthorized action. Required permission: ' . $permission], 403);
            }

            abort(403, 'Unauthorized action. You require the [' . $permission . '] permission to access this resource.');
        }

        return $next($request);
    }
}
