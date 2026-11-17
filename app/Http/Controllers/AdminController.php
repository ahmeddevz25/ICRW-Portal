<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Artisan;
use App\Models\User;
use App\Models\Role;
use App\Models\Permission;
use App\Models\ActivityLog;
use App\Helpers\ActivityLogger;

class AdminController extends Controller
{
    /**
     * Show the admin login form.
     */
    public function LoginForm()
    {
        if (Auth::check() && Auth::user()->roles->isNotEmpty()) {
            return redirect()->route('dashboard');
        }

        return view('admin.login');
    }

    /**
     * Process admin authentication.
     */
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email'    => ['required', 'email'],
            'password' => ['required', 'string'],
        ]);

        $remember = $request->boolean('remember');

        if (Auth::attempt($credentials, $remember)) {
            $user = Auth::user();

            if (!$user->is_active) {
                ActivityLogger::log('Auth', 'LOGIN_BLOCKED', "Deactivated user attempted login: {$user->email}", null, null, $user->id);
                Auth::logout();
                $request->session()->invalidate();
                $request->session()->regenerateToken();

                return back()->withErrors(['email' => 'Your administrative account has been deactivated.'])->with('error', 'Your administrative account has been deactivated.');
            }

            if ($user->roles->isEmpty()) {
                ActivityLogger::log('Auth', 'LOGIN_BLOCKED', "User without admin roles attempted portal access: {$user->email}", null, null, $user->id);
                Auth::logout();
                $request->session()->invalidate();
                $request->session()->regenerateToken();

                return back()->withErrors(['email' => 'Access denied. You do not have administrative privileges.'])->with('error', 'Access denied. You do not have administrative privileges.');
            }

            $user->timestamps = false;
            $user->last_login_at = now();
            $user->last_login_ip = $request->ip();
            $user->save();
            $user->timestamps = true;

            $request->session()->regenerate();

            ActivityLogger::log('Auth', 'LOGIN', "Administrator logged in: {$user->name} ({$user->email})", null, [
                'ip' => $request->ip(),
                'user_agent' => $request->userAgent(),
            ], $user->id);

            return redirect()->intended(route('dashboard'))->with('success', "Welcome back, {$user->name}!");
        }

        ActivityLogger::log('Auth', 'LOGIN_FAILED', "Failed login attempt for email: {$request->email}", null, ['ip' => $request->ip()]);

        return back()->withErrors([
            'email' => 'The provided credentials do not match our administrative records.',
        ])->with('error', 'Invalid email or password.')->onlyInput('email');
    }

    /**
     * Display the Executive Admin Dashboard.
     */
    public function index()
    {
        $stats = [
            'total_users'       => User::count(),
            'active_users'      => User::where('is_active', true)->count(),
            'total_roles'       => Role::count(),
            'total_permissions' => Permission::count(),
            'total_logs'        => ActivityLog::count(),
        ];

        $recentLogs = ActivityLog::with('user')
            ->recent()
            ->limit(10)
            ->get();

        $recentUsers = User::with('roles')
            ->latest('id')
            ->limit(6)
            ->get();

        $rolesDistribution = Role::withCount('users')->get();

        return view('admin.index', compact('stats', 'recentLogs', 'recentUsers', 'rolesDistribution'));
    }

    /**
     * Terminate the admin session.
     */
    public function logout(Request $request)
    {
        $user = Auth::user();

        if ($user) {
            ActivityLogger::log('Auth', 'LOGOUT', "Administrator logged out: {$user->name}", null, null, $user->id);
        }

        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')->with('success', 'You have been securely logged out.');
    }

    /**
     * Clear application, route, view and configuration caches.
     */
    public function clearcache(Request $request)
    {
        try {
            Artisan::call('optimize:clear');

            ActivityLogger::log('System', 'CACHE_CLEAR', 'System application, route, and view caches were cleared.');

            if ($request->ajax() || $request->wantsJson()) {
                return response()->json([
                    'success' => true,
                    'message' => 'System cache cleared successfully!',
                ]);
            }

            return back()->with('success', 'System cache cleared successfully!');
        } catch (\Throwable $e) {
            if ($request->ajax() || $request->wantsJson()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Cache clear error: ' . $e->getMessage(),
                ], 500);
            }

            return back()->with('error', 'Failed to clear cache: ' . $e->getMessage());
        }
    }

    /**
     * Put the application into maintenance mode.
     */
    public function siteDown()
    {
        Artisan::call('down', ['--secret' => 'icrw-admin']);
        ActivityLogger::log('System', 'MAINTENANCE_DOWN', 'Application entered maintenance mode.');
        return back()->with('warning', 'Application is now in maintenance mode.');
    }

    /**
     * Bring the application out of maintenance mode.
     */
    public function siteUp()
    {
        Artisan::call('up');
        ActivityLogger::log('System', 'MAINTENANCE_UP', 'Application brought online from maintenance mode.');
        return back()->with('success', 'Application is now online.');
    }
}
