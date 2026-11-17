<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Helpers\ActivityLogger;

class PermissionController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax() || $request->wantsJson()) {
            $query = Permission::query();

            $search = $request->input('search.value');
            if (!empty($search)) {
                $like = config('database.default') === 'pgsql' ? 'ilike' : 'like';
                $query->where(function ($q) use ($search, $like) {
                    $q->where('name', $like, "%{$search}%")
                      ->orWhere('slug', $like, "%{$search}%")
                      ->orWhere('module', $like, "%{$search}%");
                });
            }

            $totalRecords = Permission::count();
            $filteredRecords = $query->count();

            $start = (int) $request->input('start', 0);
            $length = (int) $request->input('length', 10);
            $permissions = $query->skip($start)->take($length)->orderBy('module')->orderBy('id')->get();

            $data = [];
            foreach ($permissions as $i => $perm) {
                $nameHtml = '
                    <div>
                        <span class="fw-bold text-dark d-block">' . e($perm->name) . '</span>
                        <code class="text-primary small" style="font-size: 11px;">' . e($perm->slug) . '</code>
                    </div>';

                $guardBadge = '<span class="badge bg-label-info text-capitalize">' . e($perm->module ?? 'web') . '</span>';

                $deleteUrl = route('permissions.delete', $perm->id);

                $actions = '
                    <div class="d-flex justify-content-center gap-2">
                        <button type="button" class="btn btn-sm btn-icon btn-outline-primary edit-permission-btn"
                            data-bs-toggle="modal" 
                            data-bs-target="#permissionModal"
                            data-id="' . $perm->id . '"
                            data-name="' . e($perm->name) . '"
                            title="Edit Permission">
                            <i class="bx bx-edit"></i>
                        </button>
                        <button type="button" class="btn btn-sm btn-icon btn-outline-danger delete-permission-ajax-btn"
                            data-url="' . $deleteUrl . '"
                            data-name="' . e($perm->name) . '"
                            title="Delete Permission">
                            <i class="bx bx-trash"></i>
                        </button>
                    </div>';

                $data[] = [
                    'index'   => $start + $i + 1,
                    'name'    => $nameHtml,
                    'guard'   => $guardBadge,
                    'actions' => $actions,
                ];
            }

            return response()->json([
                'draw'            => (int) $request->input('draw'),
                'recordsTotal'    => $totalRecords,
                'recordsFiltered' => $filteredRecords,
                'data'            => $data,
            ]);
        }

        return view('admin.permissions.show-permissions');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
        ]);

        $slug = Str::slug($validated['name'], '.');
        if (Permission::where('slug', $slug)->exists()) {
            $slug .= '.' . Str::random(4);
        }

        $parts = explode('.', $slug);
        $module = count($parts) > 1 ? $parts[0] : 'system';

        $permission = Permission::create([
            'name'        => $validated['name'],
            'slug'        => $slug,
            'module'      => $module,
            'description' => "Allows operational access to {$validated['name']}",
        ]);

        ActivityLogger::log('Permissions', 'CREATE', "Created permission: {$permission->name} ({$permission->slug})");

        if ($request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => "Permission '{$permission->name}' created successfully.",
            ]);
        }

        return redirect()->route('permissions')->with('success', "Permission '{$permission->name}' created successfully.");
    }

    public function edit($id)
    {
        $permission = Permission::findOrFail($id);
        return response()->json([
            'id'   => $permission->id,
            'name' => $permission->name,
            'slug' => $permission->slug,
        ]);
    }

    public function update(Request $request, $id)
    {
        $permission = Permission::findOrFail($id);

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
        ]);

        $permission->update([
            'name' => $validated['name'],
        ]);

        ActivityLogger::log('Permissions', 'UPDATE', "Updated permission title: {$permission->name}");

        if ($request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => "Permission updated successfully.",
            ]);
        }

        return redirect()->route('permissions')->with('success', "Permission updated successfully.");
    }

    public function destroy(Request $request, $id)
    {
        $permission = Permission::findOrFail($id);
        $name = $permission->name;

        $permission->roles()->detach();
        $permission->delete();

        ActivityLogger::log('Permissions', 'DELETE', "Deleted permission: {$name}");

        if ($request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => "Permission '{$name}' was deleted.",
            ]);
        }

        return redirect()->route('permissions')->with('success', "Permission '{$name}' was deleted.");
    }
}
