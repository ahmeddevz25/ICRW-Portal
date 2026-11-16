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
        $query = User::with('roles');

        if ($request->filled('search')) {
            $search = trim($request->search);
            $like = config('database.default') === 'pgsql' ? 'ilike' : 'like';
            $query->where(function ($q) use ($search, $like) {
                $q->where('name', $like, "%{$search}%")
                  ->orWhere('email', $like, "%{$search}%")
                  ->orWhere('phone', $like, "%{$search}%");
            });
        }

        if ($request->filled('role')) {
            $roleSlug = $request->role;
            $query->whereHas('roles', function ($q) use ($roleSlug) {
                $q->where('slug', $roleSlug);
            });
        }

        if ($request->filled('status')) {
            $isActive = $request->status === 'active';
            $query->where('is_active', $isActive);
        }

        $users = $query->latest('id')->paginate(12)->withQueryString();
        $roles = Role::orderBy('priority')->get();

        return view('admin.users.index', compact('users', 'roles'));
    }

    public function create()
    {
        $roles = Role::orderBy('priority')->get();
        return view('admin.users.create', compact('roles'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'      => ['required', 'string', 'max:255'],
            'email'     => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
            'phone'     => ['nullable', 'string', 'max:30'],
            'password'  => ['required', 'string', 'min:8', 'confirmed'],
            'roles'     => ['required', 'array', 'min:1'],
            'roles.*'   => ['exists:roles,id'],
            'is_active' => ['boolean'],
        ]);

        $user = User::create([
            'name'              => $validated['name'],
            'email'             => $validated['email'],
            'phone'             => $validated['phone'] ?? null,
            'password'          => Hash::make($validated['password']),
            'is_active'         => $request->boolean('is_active', true),
            'email_verified_at' => now(),
        ]);

        $user->roles()->sync($validated['roles']);

        ActivityLogger::log(
            'Users',
            'ASSIGN_ROLES',
            "Assigned roles to user {$user->name}: " . Role::whereIn('id', $validated['roles'])->pluck('name')->implode(', '),
            null,
            ['roles' => $validated['roles']]
        );

        return redirect(admin_route('users.index'))->with('success', "User '{$user->name}' created successfully.");
    }

    public function edit(User $user)
    {
        $user->load('roles');
        $roles = Role::orderBy('priority')->get();
        return view('admin.users.edit', compact('user', 'roles'));
    }

    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'name'      => ['required', 'string', 'max:255'],
            'email'     => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
            'phone'     => ['nullable', 'string', 'max:30'],
            'password'  => ['nullable', 'string', 'min:8', 'confirmed'],
            'roles'     => ['required', 'array', 'min:1'],
            'roles.*'   => ['exists:roles,id'],
            'is_active' => ['boolean'],
        ]);

        $data = [
            'name'      => $validated['name'],
            'email'     => $validated['email'],
            'phone'     => $validated['phone'] ?? null,
            'is_active' => $request->boolean('is_active', true),
        ];

        if (!empty($validated['password'])) {
            $data['password'] = Hash::make($validated['password']);
        }

        $user->update($data);
        $user->roles()->sync($validated['roles']);

        return redirect(admin_route('users.index'))->with('success', "User '{$user->name}' updated successfully.");
    }

    public function destroy(User $user)
    {
        if ($user->id === Auth::id()) {
            return back()->with('error', 'Security warning: You cannot delete your own administrative account.');
        }

        if ($user->isSuperAdmin() && User::whereHas('roles', fn($q) => $q->where('slug', 'super-admin'))->count() <= 1) {
            return back()->with('error', 'Cannot delete the sole surviving Super Administrator account.');
        }

        $name = $user->name;
        $user->roles()->detach();
        $user->delete();

        return redirect(admin_route('users.index'))->with('success', "User '{$name}' was deleted permanently.");
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
