@extends('admin.layout.master')

@section('title', 'Roles Management')

@section('breadcrumb')
  <span class="breadcrumb-active">Roles Management</span>
@endsection

@section('content')
<!-- Header -->
<div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 24px; flex-wrap: wrap; gap: 16px;">
  <div>
    <h1 style="font-size: 22px; font-weight: 800; color: #ffffff; letter-spacing: -0.02em; margin-bottom: 4px;">
      Roles Management
    </h1>
    <p style="font-size: 13px; color: var(--text-muted); margin: 0;">
      Define administrative hierarchies and associate modular permissions to roles.
    </p>
  </div>

  @can_perm('roles.create')
    <a href="{{ admin_route('roles.create') }}" class="btn-saas btn-saas-primary">
      <i class="fa-solid fa-plus"></i>
      <span>Create New Role</span>
    </a>
  @endcan_perm
</div>

<!-- Roles Table Card -->
<div class="saas-card" style="padding: 0; overflow: hidden;">
  <div class="saas-table-wrap" style="border: none;">
    <table class="saas-table">
      <thead>
        <tr>
          <th>Role Title & Identifier</th>
          <th>Description</th>
          <th>Priority Level</th>
          <th>Permissions Bound</th>
          <th>Assigned Users</th>
          <th style="text-align: right;">Actions</th>
        </tr>
      </thead>
      <tbody>
        @forelse($roles as $role)
          <tr>
            <!-- Title & Slug -->
            <td>
              <div style="display: flex; align-items: center; gap: 10px;">
                <div class="icon-box" style="width: 32px; height: 32px; border-radius: 8px; background: {{ $role->is_system ? 'rgba(197, 168, 105, 0.15)' : 'rgba(99, 102, 241, 0.15)' }}; color: {{ $role->is_system ? 'var(--accent-gold)' : '#818cf8' }}; display: flex; align-items: center; justify-content: center;">
                  <i class="fa-solid {{ $role->is_system ? 'fa-crown' : 'fa-shield-halved' }}"></i>
                </div>
                <div>
                  <div style="font-weight: 700; color: #ffffff; font-size: 13.5px;">
                    {{ $role->name }}
                    @if($role->is_system)
                      <span class="badge-pill badge-pill-gold" style="font-size: 10px; padding: 2px 6px; margin-left: 6px;">System Core</span>
                    @endif
                  </div>
                  <div style="font-size: 11.5px; color: var(--text-dim); font-family: 'JetBrains Mono', monospace;">
                    {{ $role->slug }}
                  </div>
                </div>
              </div>
            </td>

            <!-- Description -->
            <td style="font-size: 12.5px; color: #cbd5e1; max-width: 280px;">
              {{ $role->description ?? 'No detailed description assigned.' }}
            </td>

            <!-- Priority -->
            <td>
              <span class="badge-pill badge-pill-indigo" style="font-size: 11px;">
                Priority {{ $role->priority }}
              </span>
            </td>

            <!-- Permissions -->
            <td>
              <span class="badge-pill badge-pill-success" style="font-size: 11px;">
                <i class="fa-solid fa-lock" style="font-size: 10px;"></i>
                {{ $role->slug === 'super-admin' ? 'All Permissions' : $role->permissions_count . ' Permissions' }}
              </span>
            </td>

            <!-- Users Count -->
            <td>
              <span class="badge-pill badge-pill-gold" style="font-size: 11px;">
                <i class="fa-regular fa-user" style="font-size: 10px;"></i>
                {{ $role->users_count }} Users
              </span>
            </td>

            <!-- Actions -->
            <td style="text-align: right;">
              <div style="display: inline-flex; align-items: center; gap: 8px;">
                @can_perm('roles.edit')
                  <a href="{{ admin_route('roles.edit', $role) }}" class="btn-saas btn-saas-secondary btn-saas-sm" title="Edit Role & Permissions">
                    <i class="fa-solid fa-pen-to-square"></i>
                  </a>
                @endcan_perm

                @can_perm('roles.delete')
                  @if(!$role->is_system && $role->users_count === 0)
                    <form action="{{ admin_route('roles.destroy', $role) }}" method="POST" style="margin: 0; display: inline;" onsubmit="return confirm('Are you sure you want to delete role {{ $role->name }}?');">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn-saas btn-saas-danger btn-saas-sm" title="Delete Role">
                        <i class="fa-solid fa-trash-can"></i>
                      </button>
                    </form>
                  @else
                    <button type="button" class="btn-saas btn-saas-secondary btn-saas-sm" style="opacity: 0.4; cursor: not-allowed;" title="{{ $role->is_system ? 'System core roles cannot be deleted' : 'Cannot delete role with active users assigned' }}">
                      <i class="fa-solid fa-lock"></i>
                    </button>
                  @endif
                @endcan_perm
              </div>
            </td>
          </tr>
        @empty
          <tr>
            <td colspan="6" style="text-align: center; padding: 40px; color: var(--text-dim);">
              <p style="margin: 0;">No administrative roles found.</p>
            </td>
          </tr>
        @endforelse
      </tbody>
    </table>
  </div>
</div>
@endsection
