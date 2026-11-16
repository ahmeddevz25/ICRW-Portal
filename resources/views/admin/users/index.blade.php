@extends('admin.layout.master')

@section('title', 'Users Management')

@section('breadcrumb')
  <span class="breadcrumb-active">Users Management</span>
@endsection

@section('content')
<!-- Header -->
<div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 24px; flex-wrap: wrap; gap: 16px;">
  <div>
    <h1 style="font-size: 22px; font-weight: 800; color: #ffffff; letter-spacing: -0.02em; margin-bottom: 4px;">
      Users Management
    </h1>
    <p style="font-size: 13px; color: var(--text-muted); margin: 0;">
      Control administrative accounts, assign RBAC roles, and regulate system access.
    </p>
  </div>

  @can_perm('users.create')
    <a href="{{ admin_route('users.create') }}" class="btn-saas btn-saas-primary">
      <i class="fa-solid fa-user-plus"></i>
      <span>Add New User</span>
    </a>
  @endcan_perm
</div>

<!-- Filters Bar Card -->
<div class="saas-card" style="padding: 18px; margin-bottom: 24px;">
  <form action="{{ admin_route('users.index') }}" method="GET" style="display: flex; align-items: center; gap: 14px; flex-wrap: wrap;">
    <!-- Search Query -->
    <div style="flex: 1; min-width: 220px;">
      <input 
        type="text" 
        name="search" 
        class="saas-input" 
        placeholder="Search by name, email, phone..." 
        value="{{ request('search') }}"
      >
    </div>

    <!-- Role Filter -->
    <div style="min-width: 170px;">
      <select name="role" class="saas-input" style="cursor: pointer;">
        <option value="">All Roles</option>
        @foreach($roles as $role)
          <option value="{{ $role->slug }}" {{ request('role') === $role->slug ? 'selected' : '' }}>
            {{ $role->name }}
          </option>
        @endforeach
      </select>
    </div>

    <!-- Status Filter -->
    <div style="min-width: 150px;">
      <select name="status" class="saas-input" style="cursor: pointer;">
        <option value="">All Statuses</option>
        <option value="active" {{ request('status') === 'active' ? 'selected' : '' }}>Active Only</option>
        <option value="inactive" {{ request('status') === 'inactive' ? 'selected' : '' }}>Inactive Only</option>
      </select>
    </div>

    <!-- Actions -->
    <div style="display: flex; gap: 8px;">
      <button type="submit" class="btn-saas btn-saas-secondary">
        <i class="fa-solid fa-filter"></i>
        <span>Filter</span>
      </button>
      @if(request()->hasAny(['search', 'role', 'status']))
        <a href="{{ admin_route('users.index') }}" class="btn-saas btn-saas-secondary" title="Reset Filters">
          <i class="fa-solid fa-rotate-left"></i>
        </a>
      @endif
    </div>
  </form>
</div>

<!-- Users Table Card -->
<div class="saas-card" style="padding: 0; overflow: hidden;">
  <div class="saas-table-wrap" style="border: none;">
    <table class="saas-table">
      <thead>
        <tr>
          <th>User / Identity</th>
          <th>Phone</th>
          <th>Assigned Roles</th>
          <th>Account Status</th>
          <th>Last Login</th>
          <th style="text-align: right;">Actions</th>
        </tr>
      </thead>
      <tbody>
        @forelse($users as $user)
          <tr>
            <!-- Identity -->
            <td>
              <div style="display: flex; align-items: center; gap: 12px;">
                <div class="user-avatar-circle" style="width: 36px; height: 36px; font-size: 13px;">
                  {{ strtoupper(substr($user->name, 0, 1)) }}
                </div>
                <div>
                  <div style="font-weight: 700; color: #ffffff; font-size: 13.5px;">
                    {{ $user->name }}
                    @if($user->isSuperAdmin())
                      <i class="fa-solid fa-crown" style="color: var(--accent-gold); font-size: 11px; margin-left: 4px;" title="Super Administrator"></i>
                    @endif
                  </div>
                  <div style="font-size: 12px; color: var(--text-dim);">
                    {{ $user->email }}
                  </div>
                </div>
              </div>
            </td>

            <!-- Phone -->
            <td style="font-size: 12.5px; color: #cbd5e1;">
              {{ $user->phone ?? '—' }}
            </td>

            <!-- Roles -->
            <td>
              <div style="display: flex; flex-wrap: wrap; gap: 6px;">
                @forelse($user->roles as $userRole)
                  <span class="badge-pill {{ $userRole->is_system ? 'badge-pill-gold' : 'badge-pill-indigo' }}">
                    {{ $userRole->name }}
                  </span>
                @empty
                  <span style="font-size: 12px; color: var(--text-dim);">No Role Assigned</span>
                @endforelse
              </div>
            </td>

            <!-- Status Toggle -->
            <td>
              @can_perm('users.edit')
                <form action="{{ admin_route('users.toggle-status', $user) }}" method="POST" style="margin: 0; display: inline-block;">
                  @csrf
                  @method('PATCH')
                  <button 
                    type="submit" 
                    class="badge-pill {{ $user->is_active ? 'badge-pill-success' : 'badge-pill-rose' }}" 
                    style="border: none; cursor: pointer; background: {{ $user->is_active ? 'rgba(16, 185, 129, 0.15)' : 'rgba(244, 63, 94, 0.15)' }};"
                    title="Click to toggle active status"
                    {{ $user->id === Auth::id() ? 'disabled style=cursor:not-allowed;opacity:0.6;' : '' }}
                  >
                    <span class="badge-dot"></span>
                    <span>{{ $user->is_active ? 'Active' : 'Inactive' }}</span>
                  </button>
                </form>
              @else
                <span class="badge-pill {{ $user->is_active ? 'badge-pill-success' : 'badge-pill-rose' }}">
                  <span class="badge-dot"></span>
                  <span>{{ $user->is_active ? 'Active' : 'Inactive' }}</span>
                </span>
              @endcan_perm
            </td>

            <!-- Last Login -->
            <td style="font-size: 12px; color: var(--text-dim);">
              @if($user->last_login_at)
                <div>{{ $user->last_login_at->diffForHumans() }}</div>
                <div style="font-size: 10.5px; color: #64748b;">IP: {{ $user->last_login_ip ?? 'N/A' }}</div>
              @else
                <span>Never logged in</span>
              @endif
            </td>

            <!-- Actions -->
            <td style="text-align: right;">
              <div style="display: inline-flex; align-items: center; gap: 8px;">
                @can_perm('users.edit')
                  <a href="{{ admin_route('users.edit', $user) }}" class="btn-saas btn-saas-secondary btn-saas-sm" title="Edit User">
                    <i class="fa-solid fa-pen-to-square"></i>
                  </a>
                @endcan_perm

                @can_perm('users.delete')
                  @if($user->id !== Auth::id())
                    <form action="{{ admin_route('users.destroy', $user) }}" method="POST" style="margin: 0; display: inline;" onsubmit="return confirm('Are you certain you want to permanently delete user {{ $user->name }}?');">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn-saas btn-saas-danger btn-saas-sm" title="Delete User">
                        <i class="fa-solid fa-trash-can"></i>
                      </button>
                    </form>
                  @endif
                @endcan_perm
              </div>
            </td>
          </tr>
        @empty
          <tr>
            <td colspan="6" style="text-align: center; padding: 40px; color: var(--text-dim);">
              <i class="fa-solid fa-user-xmark" style="font-size: 28px; margin-bottom: 8px; opacity: 0.5;"></i>
              <p style="margin: 0;">No administrative users match your filter criteria.</p>
            </td>
          </tr>
        @endforelse
      </tbody>
    </table>
  </div>

  <!-- Pagination -->
  @if($users->hasPages())
    <div style="padding: 16px 22px; border-top: 1px solid var(--border-color); display: flex; align-items: center; justify-content: space-between;">
      <div style="font-size: 12.5px; color: var(--text-dim);">
        Showing {{ $users->firstItem() }} to {{ $users->lastItem() }} of {{ $users->total() }} accounts
      </div>
      <div>
        {{ $users->links() }}
      </div>
    </div>
  @endif
</div>
@endsection
