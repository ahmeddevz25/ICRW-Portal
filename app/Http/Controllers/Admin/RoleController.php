<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::withCount(['users', 'permissions'])
            ->orderBy('priority')
            ->orderBy('id')
            ->get();

        return view('admin.roles.index', compact('roles'));
    }

    public function create()
    {
        $modules = Permission::all()->groupBy('module');
        return view('admin.roles.create', compact('modules'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'          => ['required', 'string', 'max:255'],
            'description'   => ['nullable', 'string', 'max:1000'],
            'priority'      => ['nullable', 'integer', 'min:0'],
            'permissions'   => ['nullable', 'array'],
            'permissions.*' => ['exists:permissions,id'],
        ]);

        $slug = Str::slug($validated['name']);
        if (Role::where('slug', $slug)->exists()) {
            $slug .= '-' . Str::random(4);
        }

        $role = Role::create([
            'name'        => $validated['name'],
            'slug'        => $slug,
            'description' => $validated['description'] ?? null,
            'priority'    => $validated['priority'] ?? 10,
            'is_system'   => false,
        ]);

        if (!empty($validated['permissions'])) {
            $role->permissions()->sync($validated['permissions']);
        }

        return redirect(admin_route('roles.index'))->with('success', "Role '{$role->name}' created successfully.");
    }

    public function edit(Role $role)
    {
        $role->load('permissions');
        $modules = Permission::all()->groupBy('module');
        $assignedPermIds = $role->permissions->pluck('id')->toArray();

        return view('admin.roles.edit', compact('role', 'modules', 'assignedPermIds'));
    }

    public function update(Request $request, Role $role)
    {
        $validated = $request->validate([
            'name'          => ['required', 'string', 'max:255'],
            'description'   => ['nullable', 'string', 'max:1000'],
            'priority'      => ['nullable', 'integer', 'min:0'],
            'permissions'   => ['nullable', 'array'],
            'permissions.*' => ['exists:permissions,id'],
        ]);

        $data = [
            'name'        => $validated['name'],
            'description' => $validated['description'] ?? null,
            'priority'    => $validated['priority'] ?? $role->priority,
        ];

        // Do not alter slug of system roles
        if (!$role->is_system) {
            $data['slug'] = Str::slug($validated['name']);
        }

        $role->update($data);

        // System role "super-admin" maintains all permissions
        if ($role->slug === 'super-admin') {
            $role->permissions()->sync(Permission::pluck('id')->toArray());
        } else {
            $role->permissions()->sync($validated['permissions'] ?? []);
        }

        return redirect(admin_route('roles.index'))->with('success', "Role '{$role->name}' updated successfully.");
    }

    public function destroy(Role $role)
    {
        if ($role->is_system) {
            return back()->with('error', "Security error: System role '{$role->name}' cannot be deleted.");
        }

        if ($role->users()->count() > 0) {
            return back()->with('error', "Cannot delete role '{$role->name}' because {$role->users()->count()} user(s) are assigned to it.");
        }

        $name = $role->name;
        $role->permissions()->detach();
        $role->delete();

        return redirect(admin_route('roles.index'))->with('success', "Role '{$name}' was deleted.");
    }
}
