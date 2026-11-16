<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use App\Models\Role;

class PermissionController extends Controller
{
    public function index()
    {
        $permissions = Permission::with('roles')
            ->orderBy('module')
            ->orderBy('id')
            ->get();

        $modules = $permissions->groupBy('module');
        $totalRoles = Role::count();

        return view('admin.permissions.index', compact('modules', 'totalRoles'));
    }
}
