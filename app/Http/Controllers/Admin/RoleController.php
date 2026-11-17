<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Helpers\ActivityLogger;

class RoleController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax() || $request->wantsJson()) {
            $query = Role::with(['permissions', 'users']);

            $search = $request->input('search.value');
            if (!empty($search)) {
                $like = config('database.default') === 'pgsql' ? 'ilike' : 'like';
                $query->where(function ($q) use ($search, $like) {
                    $q->where('name', $like, "%{$search}%")
                      ->orWhere('slug', $like, "%{$search}%");
                });
            }

            $totalRecords = Role::count();
            $filteredRecords = $query->count();

            $start = (int) $request->input('start', 0);
            $length = (int) $request->input('length', 10);
            $roles = $query->skip($start)->take($length)->orderBy('priority')->get();

            $data = [];
            foreach ($roles as $i => $role) {
                $rolePerms = $role->permissions->pluck('name')->toArray();
                $permIds = $role->permissions->pluck('id')->toArray();

                $nameHtml = '
                    <div class="d-flex align-items-center gap-2">
                        <span class="avatar avatar-sm bg-label-' . ($role->is_system ? 'warning' : 'primary') . ' rounded p-1">
                            <i class="bx ' . ($role->is_system ? 'bx-crown' : 'bx-shield-quarter') . '"></i>
                        </span>
                        <div>
                            <span class="fw-bold text-dark">' . e($role->name) . '</span>
                            ' . ($role->is_system ? '<span class="badge bg-label-warning ms-1" style="font-size: 10px;">Core</span>' : '') . '
                            <small class="text-muted d-block" style="font-size: 11px;">' . e($role->slug) . '</small>
                        </div>
                    </div>';

                $permBtn = '
                    <button type="button" class="btn btn-sm btn-outline-primary view-permissions-modal-btn d-inline-flex align-items-center gap-1"
                        data-bs-toggle="modal" 
                        data-bs-target="#viewRolePermissionsModal"
                        data-role="' . e($role->name) . '"
                        data-permissions=\'' . json_encode($rolePerms) . '\'>
                        <i class="bx bx-key"></i>
                        <span>View (' . count($rolePerms) . ')</span>
                    </button>';

                $deleteUrl = route('roles.delete', $role->id);
                $canDelete = !$role->is_system && $role->users->count() === 0;

                $actions = '
                    <div class="d-flex justify-content-center gap-2">
                        <button type="button" class="btn btn-sm btn-icon btn-outline-primary edit-role-btn"
                            data-bs-toggle="modal" 
                            data-bs-target="#addRoleModal"
                            data-id="' . $role->id . '"
                            data-name="' . e($role->name) . '"
                            data-permissions=\'' . json_encode($permIds) . '\'
                            title="Edit Role">
                            <i class="bx bx-edit"></i>
                        </button>';

                if ($canDelete) {
                    $actions .= '
                        <button type="button" class="btn btn-sm btn-icon btn-outline-danger delete-role-ajax-btn"
                            data-url="' . $deleteUrl . '"
                            data-name="' . e($role->name) . '"
                            title="Delete Role">
                            <i class="bx bx-trash"></i>
                        </button>';
                } else {
                    $actions .= '
                        <button type="button" class="btn btn-sm btn-icon btn-outline-secondary" disabled title="' . ($role->is_system ? 'System role cannot be deleted' : 'Role is assigned to users') . '">
                            <i class="bx bx-lock"></i>
                        </button>';
                }

                $actions .= '</div>';

                $data[] = [
                    'index'       => $start + $i + 1,
                    'name'        => $nameHtml,
                    'permissions' => $permBtn,
                    'actions'     => $actions,
                ];
            }

            return response()->json([
                'draw'            => (int) $request->input('draw'),
                'recordsTotal'    => $totalRecords,
                'recordsFiltered' => $filteredRecords,
                'data'            => $data,
            ]);
        }

        $groupedPermissions = Permission::orderBy('id')->get()->groupBy('module');

        return view('admin.roles.show-role', compact('groupedPermissions'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'          => ['required', 'string', 'max:255'],
            'permissions'   => ['nullable', 'array'],
        ]);

        $slug = Str::slug($validated['name']);
        if (Role::where('slug', $slug)->exists()) {
            $slug .= '-' . Str::random(4);
        }

        $role = Role::create([
            'name'        => $validated['name'],
            'slug'        => $slug,
            'description' => $request->input('description'),
            'priority'    => (int) $request->input('priority', 10),
            'is_system'   => false,
        ]);

        if (!empty($validated['permissions'])) {
            $permIds = Permission::whereIn('id', $validated['permissions'])
                ->orWhereIn('name', $validated['permissions'])
                ->pluck('id')
                ->toArray();

            $role->permissions()->sync($permIds);
        }

        ActivityLogger::log('Roles', 'CREATE', "Created security role: {$role->name}");

        if ($request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => "Role '{$role->name}' created successfully.",
            ]);
        }

        return redirect()->route('roles')->with('success', "Role '{$role->name}' created successfully.");
    }

    public function edit($id)
    {
        $role = Role::with('permissions')->findOrFail($id);
        return response()->json([
            'id'          => $role->id,
            'name'        => $role->name,
            'permissions' => $role->permissions->pluck('id')->toArray(),
        ]);
    }

    public function update(Request $request, $id)
    {
        $role = Role::findOrFail($id);

        $validated = $request->validate([
            'name'        => ['required', 'string', 'max:255'],
            'permissions' => ['nullable', 'array'],
        ]);

        $data = ['name' => $validated['name']];

        if (!$role->is_system) {
            $data['slug'] = Str::slug($validated['name']);
        }

        $role->update($data);

        // System super-admin keeps all permissions
        if ($role->slug === 'super-admin') {
            $role->permissions()->sync(Permission::pluck('id')->toArray());
        } else {
            $permIds = [];
            if (!empty($validated['permissions'])) {
                $permIds = Permission::whereIn('id', $validated['permissions'])
                    ->orWhereIn('name', $validated['permissions'])
                    ->pluck('id')
                    ->toArray();
            }
            $role->permissions()->sync($permIds);
        }

        ActivityLogger::log('Roles', 'UPDATE', "Updated role and permissions for: {$role->name}");

        if ($request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => "Role '{$role->name}' updated successfully.",
            ]);
        }

        return redirect()->route('roles')->with('success', "Role '{$role->name}' updated successfully.");
    }

    public function destroy(Request $request, $id)
    {
        $role = Role::findOrFail($id);

        if ($role->is_system) {
            if ($request->ajax()) {
                return response()->json(['message' => "System core role '{$role->name}' cannot be deleted."], 403);
            }
            return back()->with('error', "System core role '{$role->name}' cannot be deleted.");
        }

        if ($role->users()->count() > 0) {
            if ($request->ajax()) {
                return response()->json(['message' => "Cannot delete role because {$role->users()->count()} user(s) are assigned to it."], 403);
            }
            return back()->with('error', "Cannot delete role because {$role->users()->count()} user(s) are assigned to it.");
        }

        $name = $role->name;
        $role->permissions()->detach();
        $role->delete();

        ActivityLogger::log('Roles', 'DELETE', "Deleted role: {$name}");

        if ($request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => "Role '{$name}' was deleted.",
            ]);
        }

        return redirect()->route('roles')->with('success', "Role '{$name}' was deleted.");
    }
}
