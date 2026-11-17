<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use App\Helpers\ActivityLogger;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $roles = Role::orderBy('priority')->get();

        if ($request->ajax() || $request->wantsJson()) {
            $query = User::with('roles');

            // Role filter
            if ($request->filled('role_filter')) {
                $roleName = $request->role_filter;
                $query->whereHas('roles', function ($q) use ($roleName) {
                    $q->where('name', $roleName)->orWhere('slug', $roleName);
                });
            }

            // Global search
            $search = $request->input('search.value');
            if (!empty($search)) {
                $like = config('database.default') === 'pgsql' ? 'ilike' : 'like';
                $query->where(function ($q) use ($search, $like) {
                    $q->where('name', $like, "%{$search}%")
                      ->orWhere('email', $like, "%{$search}%")
                      ->orWhere('phone', $like, "%{$search}%");
                });
            }

            $totalRecords = User::count();
            $filteredRecords = $query->count();

            $start = (int) $request->input('start', 0);
            $length = (int) $request->input('length', 10);
            $users = $query->skip($start)->take($length)->latest('id')->get();

            $data = [];
            foreach ($users as $i => $u) {
                $primaryRole = $u->roles->first();
                $roleName = $primaryRole ? $primaryRole->name : 'No Role';
                $initial = strtoupper(substr($u->name, 0, 1));

                $nameHtml = '
                    <div class="d-flex align-items-center gap-2">
                        <div class="avatar bg-label-primary rounded-circle d-flex align-items-center justify-content-center" style="width: 34px; height: 34px; font-weight: 700;">
                            ' . e($initial) . '
                        </div>
                        <div>
                            <span class="fw-bold text-dark d-block">' . e($u->name) . '</span>
                            ' . ($u->isSuperAdmin() ? '<small class="text-warning fw-semibold"><i class="bx bxs-crown"></i> Super Admin</small>' : '') . '
                        </div>
                    </div>';

                $roleBadge = $primaryRole && $primaryRole->is_system
                    ? '<span class="badge bg-label-warning fw-bold">' . e($roleName) . '</span>'
                    : '<span class="badge bg-label-primary">' . e($roleName) . '</span>';

                $statusBadge = $u->is_active
                    ? '<span class="badge bg-label-success">Active</span>'
                    : '<span class="badge bg-label-danger">Inactive</span>';

                $deleteUrl = route('users.destroy', $u->id);
                $isSelf = $u->id === Auth::id();

                $actions = '
                    <div class="d-flex justify-content-center gap-2">
                        <button class="btn btn-sm btn-icon btn-outline-primary editUserBtn" 
                            data-id="' . $u->id . '" 
                            data-name="' . e($u->name) . '" 
                            data-email="' . e($u->email) . '" 
                            data-phone="' . e($u->phone ?? '') . '" 
                            data-role="' . e($roleName) . '" 
                            data-active="' . ($u->is_active ? '1' : '0') . '" 
                            data-bs-toggle="modal" 
                            data-bs-target="#userModal" 
                            title="Edit User">
                            <i class="bx bx-edit"></i>
                        </button>';

                if (!$isSelf) {
                    $actions .= '
                        <button class="btn btn-sm btn-icon btn-outline-danger delete-user-ajax-btn" 
                            data-url="' . $deleteUrl . '" 
                            data-name="' . e($u->name) . '" 
                            title="Delete User">
                            <i class="bx bx-trash"></i>
                        </button>';
                } else {
                    $actions .= '
                        <button class="btn btn-sm btn-icon btn-outline-secondary" disabled title="Cannot delete self">
                            <i class="bx bx-lock"></i>
                        </button>';
                }

                $actions .= '</div>';

                $data[] = [
                    'index'   => $start + $i + 1,
                    'name'    => $nameHtml,
                    'email'   => e($u->email),
                    'phone'   => e($u->phone ?? '—'),
                    'roles'   => $roleBadge,
                    'status'  => $statusBadge,
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

        return view('admin.users-managment.show-users', compact('roles'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'      => ['required', 'string', 'max:255'],
            'email'     => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
            'phone'     => ['nullable', 'string', 'max:30'],
            'password'  => ['required', 'string', 'min:6'],
            'role'      => ['nullable', 'string'],
            'roles'     => ['nullable'],
            'is_active' => ['nullable'],
        ]);

        $user = User::create([
            'name'              => $validated['name'],
            'email'             => $validated['email'],
            'phone'             => $validated['phone'] ?? null,
            'password'          => Hash::make($validated['password']),
            'is_active'         => $request->boolean('is_active', true),
            'email_verified_at' => now(),
        ]);

        // Attach role
        $roleInput = $validated['role'] ?? $validated['roles'] ?? null;
        if ($roleInput) {
            $role = is_array($roleInput)
                ? Role::whereIn('id', $roleInput)->orWhereIn('name', $roleInput)->get()
                : Role::where('name', $roleInput)->orWhere('slug', $roleInput)->orWhere('id', $roleInput)->get();

            if ($role->isNotEmpty()) {
                $user->roles()->sync($role->pluck('id'));
            }
        }

        ActivityLogger::log('Users', 'CREATE', "Created administrative user: {$user->name} ({$user->email})");

        if ($request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => "User '{$user->name}' created successfully.",
            ]);
        }

        return redirect()->route('users.index')->with('success', "User '{$user->name}' created successfully.");
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $validated = $request->validate([
            'name'      => ['required', 'string', 'max:255'],
            'email'     => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
            'phone'     => ['nullable', 'string', 'max:30'],
            'password'  => ['nullable', 'string', 'min:6'],
            'role'      => ['nullable', 'string'],
            'roles'     => ['nullable'],
            'is_active' => ['nullable'],
        ]);

        $data = [
            'name'      => $validated['name'],
            'email'     => $validated['email'],
            'phone'     => $validated['phone'] ?? null,
            'is_active' => $user->id === Auth::id() ? true : $request->boolean('is_active', true),
        ];

        if (!empty($validated['password'])) {
            $data['password'] = Hash::make($validated['password']);
        }

        $user->update($data);

        // Sync role
        $roleInput = $validated['role'] ?? $validated['roles'] ?? null;
        if ($roleInput) {
            $role = is_array($roleInput)
                ? Role::whereIn('id', $roleInput)->orWhereIn('name', $roleInput)->get()
                : Role::where('name', $roleInput)->orWhere('slug', $roleInput)->orWhere('id', $roleInput)->get();

            if ($role->isNotEmpty()) {
                $user->roles()->sync($role->pluck('id'));
            }
        }

        ActivityLogger::log('Users', 'UPDATE', "Updated user details for: {$user->name}");

        if ($request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => "User '{$user->name}' updated successfully.",
            ]);
        }

        return redirect()->route('users.index')->with('success', "User '{$user->name}' updated successfully.");
    }

    public function destroy(Request $request, $id)
    {
        $user = User::findOrFail($id);

        if ($user->id === Auth::id()) {
            if ($request->ajax()) {
                return response()->json(['message' => 'Security warning: You cannot delete your own administrative account.'], 403);
            }
            return back()->with('error', 'Security warning: You cannot delete your own administrative account.');
        }

        if ($user->isSuperAdmin() && User::whereHas('roles', fn($q) => $q->where('slug', 'super-admin'))->count() <= 1) {
            if ($request->ajax()) {
                return response()->json(['message' => 'Cannot delete the sole surviving Super Administrator account.'], 403);
            }
            return back()->with('error', 'Cannot delete the sole surviving Super Administrator account.');
        }

        $name = $user->name;
        $user->roles()->detach();
        $user->delete();

        ActivityLogger::log('Users', 'DELETE', "Deleted user account: {$name}");

        if ($request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => "User '{$name}' was deleted successfully.",
            ]);
        }

        return redirect()->route('users.index')->with('success', "User '{$name}' was deleted permanently.");
    }

    public function toggleStatus(User $user)
    {
        if ($user->id === Auth::id()) {
            return back()->with('error', 'You cannot deactivate your own account.');
        }

        $user->is_active = !$user->is_active;
        $user->save();

        $statusText = $user->is_active ? 'activated' : 'deactivated';
        ActivityLogger::log('Users', 'STATUS_CHANGE', "User account {$user->name} was {$statusText}.");

        return back()->with('success', "User '{$user->name}' has been {$statusText}.");
    }
}
