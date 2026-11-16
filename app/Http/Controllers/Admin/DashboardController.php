<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Role;
use App\Models\Permission;
use App\Models\ActivityLog;

class DashboardController extends Controller
{
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

        return view('admin.dashboard', compact('stats', 'recentLogs', 'recentUsers', 'rolesDistribution'));
    }
}
