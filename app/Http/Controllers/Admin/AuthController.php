<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Helpers\ActivityLogger;

class AuthController extends Controller
{
    public function showLoginForm(Request $request)
    {
        $dashboardRoute = $request->is('demo*') ? 'demo.admin.dashboard' : 'admin.dashboard';

        if (Auth::check() && Auth::user()->roles->isNotEmpty()) {
            return redirect()->route($dashboardRoute);
        }

        return view('admin.auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email'    => ['required', 'email'],
            'password' => ['required', 'string'],
        ]);

        $remember = $request->boolean('remember');

        if (Auth::attempt($credentials, $remember)) {
            $user = Auth::user();

            // Check if account is active
            if (!$user->is_active) {
                ActivityLogger::log('Auth', 'LOGIN_BLOCKED', "Deactivated user attempted login: {$user->email}", null, null, $user->id);
                Auth::logout();
                $request->session()->invalidate();
                $request->session()->regenerateToken();

                return back()->withErrors(['email' => 'Your administrative account has been deactivated.']);
            }

            // Check if user has administrative roles
            if ($user->roles->isEmpty()) {
                ActivityLogger::log('Auth', 'LOGIN_BLOCKED', "User without admin roles attempted portal access: {$user->email}", null, null, $user->id);
                Auth::logout();
                $request->session()->invalidate();
                $request->session()->regenerateToken();

                return back()->withErrors(['email' => 'Access denied. You do not have administrative privileges.']);
            }

            // Update login metadata without firing full model update
            $user->timestamps = false;
            $user->last_login_at = now();
            $user->last_login_ip = $request->ip();
            $user->save();
            $user->timestamps = true;

            $request->session()->regenerate();

            ActivityLogger::log('Auth', 'LOGIN', "Administrator logged into executive portal: {$user->name} ({$user->email})", null, [
                'ip' => $request->ip(),
                'user_agent' => $request->userAgent(),
            ], $user->id);

            $dashboardRoute = $request->is('demo*') ? 'demo.admin.dashboard' : 'admin.dashboard';

            return redirect()->intended(route($dashboardRoute))->with('success', "Welcome back, {$user->name}!");
        }

        ActivityLogger::log('Auth', 'LOGIN_FAILED', "Failed login attempt for email: {$request->email}", null, ['ip' => $request->ip()]);

        return back()->withErrors([
            'email' => 'The provided credentials do not match our administrative records.',
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        $user = Auth::user();

        if ($user) {
            ActivityLogger::log('Auth', 'LOGOUT', "Administrator logged out: {$user->name}", null, null, $user->id);
        }

        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        $loginRoute = $request->is('demo*') ? 'demo.admin.login' : 'admin.login';

        return redirect()->route($loginRoute)->with('info', 'You have been securely logged out.');
    }
}
