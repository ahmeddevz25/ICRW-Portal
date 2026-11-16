@extends('admin.layout.master')

@section('title', 'Executive Overview')

@section('breadcrumb')
  <span class="breadcrumb-active">Executive Overview</span>
@endsection

@section('content')
<!-- Page Header -->
<div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 28px; flex-wrap: wrap; gap: 16px;">
  <div>
    <h1 style="font-size: 22px; font-weight: 800; color: #ffffff; letter-spacing: -0.02em; margin-bottom: 4px;">
      Welcome back, {{ Auth::user()->name }}
    </h1>
    <p style="font-size: 13px; color: var(--text-muted); margin: 0;">
      ICRW Enterprise Security, Role-Based Access Control & Real-time Audit Matrix.
    </p>
  </div>

  <div style="display: flex; align-items: center; gap: 10px;">
    @can_perm('users.create')
      <a href="{{ admin_route('users.create') }}" class="btn-saas btn-saas-primary">
        <i class="fa-solid fa-user-plus"></i>
        <span>Add Admin User</span>
      </a>
    @endcan_perm

    @can_perm('system.cache_clear')
      <button type="button" onclick="executeSystemCacheClear()" class="btn-saas btn-saas-gold">
        <i class="fa-solid fa-arrows-rotate"></i>
        <span>Flush Cache</span>
      </button>
    @endcan_perm
  </div>
</div>

<!-- ========================================================
     KPI STAT CARDS (5 METRICS)
     ======================================================== -->
<div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(210px, 1fr)); gap: 18px; margin-bottom: 30px;">
  <!-- Total Users -->
  <div class="kpi-card">
    <div>
      <div class="kpi-label">Total Users</div>
      <div class="kpi-value">{{ number_format($stats['total_users']) }}</div>
    </div>
    <div class="kpi-icon-box" style="background: rgba(99, 102, 241, 0.15); color: #818cf8;">
      <i class="fa-solid fa-users"></i>
    </div>
  </div>

  <!-- Active Users -->
  <div class="kpi-card">
    <div>
      <div class="kpi-label">Active Accounts</div>
      <div class="kpi-value">{{ number_format($stats['active_users']) }}</div>
    </div>
    <div class="kpi-icon-box" style="background: rgba(16, 185, 129, 0.15); color: #34d399;">
      <i class="fa-solid fa-user-check"></i>
    </div>
  </div>

  <!-- Roles -->
  <div class="kpi-card">
    <div>
      <div class="kpi-label">Configured Roles</div>
      <div class="kpi-value">{{ number_format($stats['total_roles']) }}</div>
    </div>
    <div class="kpi-icon-box" style="background: rgba(197, 168, 105, 0.18); color: #e5cf96;">
      <i class="fa-solid fa-shield-halved"></i>
    </div>
  </div>

  <!-- Permissions -->
  <div class="kpi-card">
    <div>
      <div class="kpi-label">Access Permissions</div>
      <div class="kpi-value">{{ number_format($stats['total_permissions']) }}</div>
    </div>
    <div class="kpi-icon-box" style="background: rgba(14, 165, 233, 0.15); color: #38bdf8;">
      <i class="fa-solid fa-lock"></i>
    </div>
  </div>

  <!-- Activity Logs -->
  <div class="kpi-card">
    <div>
      <div class="kpi-label">Audit Logs Recorded</div>
      <div class="kpi-value">{{ number_format($stats['total_logs']) }}</div>
    </div>
    <div class="kpi-icon-box" style="background: rgba(244, 63, 94, 0.15); color: #fb7185;">
      <i class="fa-solid fa-clock-rotate-left"></i>
    </div>
  </div>
</div>

<!-- ========================================================
     DUAL COLUMN SECTION (Audit Trail + Governance Summary)
     ======================================================== -->
<div style="display: grid; grid-template-columns: 1.8fr 1fr; gap: 24px; align-items: start;">
  
  <!-- Left Column: Recent Audit Trail Table -->
  <div class="saas-card">
    <div class="saas-card-header">
      <div class="saas-card-title">
        <i class="fa-solid fa-list-check" style="color: var(--accent-indigo);"></i>
        <span>Live Activity Audit Trail</span>
      </div>
      @can_perm('logs.view')
        <a href="{{ admin_route('logs.index') }}" class="btn-saas btn-saas-secondary btn-saas-sm">
          <span>View All Logs</span>
          <i class="fa-solid fa-arrow-right" style="font-size: 11px;"></i>
        </a>
      @endcan_perm
    </div>

    @if($recentLogs->isEmpty())
      <div style="text-align: center; padding: 40px 20px; color: var(--text-dim);">
        <i class="fa-solid fa-shield-halved" style="font-size: 32px; margin-bottom: 12px; opacity: 0.5;"></i>
        <p style="margin: 0; font-size: 13.5px;">No activity logs recorded yet.</p>
      </div>
    @else
      <div class="saas-table-wrap">
        <table class="saas-table">
          <thead>
            <tr>
              <th>Operator</th>
              <th>Action</th>
              <th>Description</th>
              <th>Timestamp</th>
              <th style="text-align: right;">Inspect</th>
            </tr>
          </thead>
          <tbody>
            @foreach($recentLogs as $log)
              <tr>
                <td>
                  <div style="display: flex; align-items: center; gap: 10px;">
                    <div style="width: 28px; height: 28px; border-radius: 50%; background: #1e293b; color: #cbd5e1; display: flex; align-items: center; justify-content: center; font-size: 11px; font-weight: 700;">
                      {{ strtoupper(substr($log->user->name ?? 'S', 0, 1)) }}
                    </div>
                    <div>
                      <div style="font-weight: 600; color: #ffffff; font-size: 12.5px;">
                        {{ $log->user->name ?? 'System' }}
                      </div>
                      <div style="font-size: 11px; color: var(--text-dim);">
                        {{ $log->ip_address }}
                      </div>
                    </div>
                  </div>
                </td>
                <td>
                  @php
                    $actionBadge = match(strtoupper($log->action)) {
                      'CREATE' => 'badge-pill-success',
                      'UPDATE' => 'badge-pill-indigo',
                      'DELETE' => 'badge-pill-rose',
                      'LOGIN'  => 'badge-pill-indigo',
                      'LOGOUT' => 'badge-pill-gold',
                      'CACHE_CLEAR' => 'badge-pill-warning',
                      default  => 'badge-pill-indigo',
                    };
                  @endphp
                  <span class="badge-pill {{ $actionBadge }}" style="font-size: 10.5px; padding: 2px 8px;">
                    {{ $log->action }}
                  </span>
                </td>
                <td style="max-width: 260px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; font-size: 12.5px;">
                  <span title="{{ $log->description }}">{{ $log->description }}</span>
                </td>
                <td style="font-size: 12px; color: var(--text-dim); white-space: nowrap;">
                  {{ $log->created_at->diffForHumans() }}
                </td>
                <td style="text-align: right;">
                  <button type="button" onclick="inspectLog({{ $log->id }})" class="btn-saas btn-saas-secondary btn-saas-sm" style="padding: 4px 8px;" title="Inspect Payload Diff">
                    <i class="fa-solid fa-code" style="font-size: 11px;"></i>
                  </button>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    @endif
  </div>

  <!-- Right Column: Governance, Roles & Recent Users -->
  <div style="display: flex; flex-direction: column; gap: 24px;">
    
    <!-- Roles Distribution Card -->
    <div class="saas-card">
      <div class="saas-card-header">
        <div class="saas-card-title">
          <i class="fa-solid fa-shield-halved" style="color: var(--accent-gold);"></i>
          <span>Roles Distribution</span>
        </div>
        @can_perm('roles.view')
          <a href="{{ admin_route('roles.index') }}" style="font-size: 12px; color: var(--accent-gold); text-decoration: none; font-weight: 600;">Manage &rarr;</a>
        @endcan_perm
      </div>

      <div style="display: flex; flex-direction: column; gap: 12px;">
        @foreach($rolesDistribution as $role)
          <div style="display: flex; align-items: center; justify-content: space-between; padding: 10px 14px; background: rgba(255,255,255,0.02); border: 1px solid var(--border-color); border-radius: 8px;">
            <div>
              <div style="font-size: 13px; font-weight: 600; color: #ffffff;">
                {{ $role->name }}
              </div>
              <div style="font-size: 11px; color: var(--text-dim);">
                {{ $role->description ? Str::limit($role->description, 36) : 'Priority: ' . $role->priority }}
              </div>
            </div>
            <span class="badge-pill badge-pill-gold">
              {{ $role->users_count }} Users
            </span>
          </div>
        @endforeach
      </div>
    </div>

    <!-- Recent Users Card -->
    <div class="saas-card">
      <div class="saas-card-header">
        <div class="saas-card-title">
          <i class="fa-regular fa-user" style="color: var(--accent-indigo);"></i>
          <span>Recent Administrators</span>
        </div>
        @can_perm('users.view')
          <a href="{{ admin_route('users.index') }}" style="font-size: 12px; color: var(--accent-indigo); text-decoration: none; font-weight: 600;">All Users &rarr;</a>
        @endcan_perm
      </div>

      <div style="display: flex; flex-direction: column; gap: 12px;">
        @foreach($recentUsers as $user)
          <div style="display: flex; align-items: center; justify-content: space-between;">
            <div style="display: flex; align-items: center; gap: 10px;">
              <div style="width: 32px; height: 32px; border-radius: 50%; background: linear-gradient(135deg, #4f46e5, #c5a869); color: #fff; display: flex; align-items: center; justify-content: center; font-size: 12px; font-weight: 700;">
                {{ strtoupper(substr($user->name, 0, 1)) }}
              </div>
              <div>
                <div style="font-size: 13px; font-weight: 600; color: #ffffff;">{{ $user->name }}</div>
                <div style="font-size: 11px; color: var(--text-dim);">{{ $user->email }}</div>
              </div>
            </div>
            <div>
              @if($user->is_active)
                <span class="badge-pill badge-pill-success" style="font-size: 10.5px;">Active</span>
              @else
                <span class="badge-pill badge-pill-rose" style="font-size: 10.5px;">Inactive</span>
              @endif
            </div>
          </div>
        @endforeach
      </div>
    </div>

  </div>
</div>
@endsection
