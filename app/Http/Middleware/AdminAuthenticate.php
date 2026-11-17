<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminAuthenticate
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        $loginRoute = \Illuminate\Support\Facades\Route::has('login') ? 'login' : 'admin.login';

        if (!Auth::check()) {
            if ($request->expectsJson()) {
                return response()->json(['message' => 'Unauthenticated.'], 401);
            }
            return redirect()->route($loginRoute)->with('warning', 'Please sign in to access the ICRW Executive Portal.');
        }

        $user = Auth::user();

        // Check active status
        if (!$user->is_active) {
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();

            return redirect()->route($loginRoute)->with('error', 'Your administrative account has been deactivated. Please contact Super Admin.');
        }

        // Check if user has any administrative role
        if ($user->roles->isEmpty()) {
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();

            return redirect()->route($loginRoute)->with('error', 'Access restricted. You do not possess administrative privileges.');
        }

        return $next($request);
    }
}
