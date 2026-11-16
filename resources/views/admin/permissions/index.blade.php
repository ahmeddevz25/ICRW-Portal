@extends('admin.layout.master')

@section('title', 'Permissions Management')

@section('breadcrumb')
  <span class="breadcrumb-active">Permissions Management</span>
@endsection

@section('content')
<!-- Header -->
<div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 24px; flex-wrap: wrap; gap: 16px;">
  <div>
    <h1 style="font-size: 22px; font-weight: 800; color: #ffffff; letter-spacing: -0.02em; margin-bottom: 4px;">
      Permissions Management
    </h1>
    <p style="font-size: 13px; color: var(--text-muted); margin: 0;">
      Cryptographic access control registry governing route authorization and operational policies.
    </p>
  </div>

  <span class="badge-pill badge-pill-gold">
    <i class="fa-solid fa-shield-halved"></i>
    <span>{{ $modules->flatten()->count() }} System Capabilities Registered</span>
  </span>
</div>

<!-- Informational Note -->
<div style="background: rgba(99, 102, 241, 0.08); border: 1px solid rgba(99, 102, 241, 0.25); border-radius: 12px; padding: 16px 20px; margin-bottom: 24px; display: flex; align-items: flex-start; gap: 14px;">
  <i class="fa-solid fa-circle-info" style="color: var(--accent-indigo); font-size: 18px; margin-top: 2px;"></i>
  <div style="font-size: 13px; color: #cbd5e1; line-height: 1.5;">
    <strong style="color: #ffffff;">System Policy Integrity:</strong> Permissions represent core programmatic gates across controllers and middleware. To guarantee platform stability, permission tokens are immutably tied to code controllers. Roles can be flexibly configured to grant any combination of these permissions.
  </div>
</div>

<!-- Modules Grid -->
<div style="display: flex; flex-direction: column; gap: 24px;">
  @foreach($modules as $moduleName => $permissions)
    <div class="saas-card" style="padding: 0; overflow: hidden;">
      <div class="saas-card-header" style="padding: 18px 24px; margin-bottom: 0; background: rgba(15, 23, 42, 0.6); border-bottom: 1px solid var(--border-color);">
        <div class="saas-card-title">
          @php
            $icon = match(strtolower($moduleName)) {
              'users'       => 'fa-regular fa-user',
              'roles'       => 'fa-solid fa-shield-halved',
              'permissions' => 'fa-solid fa-lock',
              'logs'        => 'fa-solid fa-clock-rotate-left',
              'system'      => 'fa-solid fa-sliders',
              default       => 'fa-solid fa-key',
            };
          @endphp
          <i class="{{ $icon }}" style="color: var(--accent-indigo);"></i>
          <span>{{ strtoupper($moduleName) }} MODULE</span>
        </div>
        <span class="badge-pill badge-pill-indigo" style="font-size: 11px;">
          {{ $permissions->count() }} Actions
        </span>
      </div>

      <div class="saas-table-wrap" style="border: none;">
        <table class="saas-table">
          <thead>
            <tr>
              <th style="width: 220px;">Permission Name</th>
              <th style="width: 200px;">System Gate Slug</th>
              <th>Operational Scope</th>
              <th>Holding Roles</th>
            </tr>
          </thead>
          <tbody>
            @foreach($permissions as $perm)
              <tr>
                <td style="font-weight: 700; color: #ffffff;">
                  {{ $perm->name }}
                </td>
                <td>
                  <code style="background: #090d16; border: 1px solid var(--border-color); color: #818cf8; padding: 4px 8px; border-radius: 6px; font-size: 12px; font-family: 'JetBrains Mono', monospace;">
                    {{ $perm->slug }}
                  </code>
                </td>
                <td style="font-size: 12.5px; color: #cbd5e1;">
                  {{ $perm->description ?? 'Standard module policy.' }}
                </td>
                <td>
                  <div style="display: flex; flex-wrap: wrap; gap: 6px;">
                    <span class="badge-pill badge-pill-gold" title="Super Administrator retains full master bypass">
                      Super Admin*
                    </span>
                    @forelse($perm->roles->where('slug', '!=', 'super-admin') as $role)
                      <span class="badge-pill badge-pill-indigo">
                        {{ $role->name }}
                      </span>
                    @empty
                      <span style="font-size: 11px; color: var(--text-dim); padding-top: 2px;">(No other roles assigned)</span>
                    @endforelse
                  </div>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  @endforeach
</div>
@endsection
