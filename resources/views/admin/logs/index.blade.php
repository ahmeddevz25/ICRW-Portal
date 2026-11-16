@extends('admin.layout.master')

@section('title', 'Audit Trail & Activity Logs')

@section('breadcrumb')
  <span class="breadcrumb-active">Activity Logs</span>
@endsection

@section('content')
<!-- Header -->
<div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 24px; flex-wrap: wrap; gap: 16px;">
  <div>
    <h1 style="font-size: 22px; font-weight: 800; color: #ffffff; letter-spacing: -0.02em; margin-bottom: 4px;">
      Audit Trail & Activity Logs
    </h1>
    <p style="font-size: 13px; color: var(--text-muted); margin: 0;">
      Immutable security ledger documenting every administrative state mutation, authentication, and cache purge.
    </p>
  </div>

  @can_perm('logs.clear')
    <form action="{{ admin_route('logs.clear') }}" method="POST" onsubmit="return confirm('Prune activity records older than 30 days?');">
      @csrf
      <input type="hidden" name="days" value="30">
      <button type="submit" class="btn-saas btn-saas-secondary btn-saas-sm" style="color: #fb7185; border-color: rgba(244, 63, 94, 0.3);">
        <i class="fa-solid fa-broom"></i>
        <span>Prune Logs (> 30 Days)</span>
      </button>
    </form>
  @endcan_perm
</div>

<!-- Filters Bar Card -->
<div class="saas-card" style="padding: 18px; margin-bottom: 24px;">
  <form action="{{ admin_route('logs.index') }}" method="GET" style="display: flex; align-items: center; gap: 12px; flex-wrap: wrap;">
    <!-- Search Query -->
    <div style="flex: 1; min-width: 200px;">
      <input 
        type="text" 
        name="search" 
        class="saas-input" 
        placeholder="Search description, IP address..." 
        value="{{ request('search') }}"
      >
    </div>

    <!-- Module Filter -->
    <div style="min-width: 140px;">
      <select name="module" class="saas-input" style="cursor: pointer;">
        <option value="">All Modules</option>
        @foreach($modules as $m)
          <option value="{{ $m }}" {{ request('module') === $m ? 'selected' : '' }}>
            {{ ucfirst($m) }}
          </option>
        @endforeach
      </select>
    </div>

    <!-- Action Filter -->
    <div style="min-width: 140px;">
      <select name="action" class="saas-input" style="cursor: pointer;">
        <option value="">All Actions</option>
        @foreach($actions as $a)
          <option value="{{ $a }}" {{ request('action') === $a ? 'selected' : '' }}>
            {{ $a }}
          </option>
        @endforeach
      </select>
    </div>

    <!-- User Filter -->
    <div style="min-width: 160px;">
      <select name="user_id" class="saas-input" style="cursor: pointer;">
        <option value="">All Operators</option>
        @foreach($users as $u)
          <option value="{{ $u->id }}" {{ request('user_id') == $u->id ? 'selected' : '' }}>
            {{ $u->name }}
          </option>
        @endforeach
      </select>
    </div>

    <!-- Date Picker -->
    <div style="min-width: 140px;">
      <input 
        type="date" 
        name="date" 
        class="saas-input" 
        value="{{ request('date') }}"
      >
    </div>

    <!-- Actions -->
    <div style="display: flex; gap: 8px;">
      <button type="submit" class="btn-saas btn-saas-secondary">
        <i class="fa-solid fa-filter"></i>
        <span>Filter</span>
      </button>
      @if(request()->hasAny(['search', 'module', 'action', 'user_id', 'date']))
        <a href="{{ admin_route('logs.index') }}" class="btn-saas btn-saas-secondary" title="Reset Filters">
          <i class="fa-solid fa-rotate-left"></i>
        </a>
      @endif
    </div>
  </form>
</div>

<!-- Logs Table Card -->
<div class="saas-card" style="padding: 0; overflow: hidden;">
  <div class="saas-table-wrap" style="border: none;">
    <table class="saas-table">
      <thead>
        <tr>
          <th>Timestamp</th>
          <th>Operator</th>
          <th>Module</th>
          <th>Action</th>
          <th>Description</th>
          <th>Network IP</th>
          <th style="text-align: right;">Inspector</th>
        </tr>
      </thead>
      <tbody>
        @forelse($logs as $log)
          <tr>
            <!-- Timestamp -->
            <td style="white-space: nowrap;">
              <div style="font-weight: 600; color: #ffffff; font-size: 12.5px;">
                {{ $log->created_at->format('M d, Y') }}
              </div>
              <div style="font-size: 11px; color: var(--text-dim);">
                {{ $log->created_at->format('h:i:s A') }} ({{ $log->created_at->diffForHumans() }})
              </div>
            </td>

            <!-- Operator -->
            <td>
              <div style="display: flex; align-items: center; gap: 10px;">
                <div style="width: 28px; height: 28px; border-radius: 50%; background: #1e293b; color: #cbd5e1; display: flex; align-items: center; justify-content: center; font-size: 11px; font-weight: 700;">
                  {{ strtoupper(substr($log->user->name ?? 'S', 0, 1)) }}
                </div>
                <div>
                  <div style="font-weight: 600; color: #ffffff; font-size: 12.5px;">
                    {{ $log->user->name ?? 'System Service' }}
                  </div>
                  <div style="font-size: 11px; color: var(--text-dim);">
                    {{ $log->user->email ?? 'Automated Daemon' }}
                  </div>
                </div>
              </div>
            </td>

            <!-- Module -->
            <td>
              <span class="badge-pill badge-pill-indigo" style="font-size: 11px;">
                {{ ucfirst($log->module) }}
              </span>
            </td>

            <!-- Action -->
            <td>
              @php
                $actionBadge = match(strtoupper($log->action)) {
                  'CREATE'      => 'badge-pill-success',
                  'UPDATE'      => 'badge-pill-indigo',
                  'DELETE'      => 'badge-pill-rose',
                  'LOGIN'       => 'badge-pill-indigo',
                  'LOGIN_FAILED'=> 'badge-pill-rose',
                  'LOGOUT'      => 'badge-pill-gold',
                  'CACHE_CLEAR' => 'badge-pill-warning',
                  default       => 'badge-pill-indigo',
                };
              @endphp
              <span class="badge-pill {{ $actionBadge }}" style="font-size: 11px;">
                {{ $log->action }}
              </span>
            </td>

            <!-- Description -->
            <td style="max-width: 320px; font-size: 12.5px; color: #cbd5e1;">
              {{ $log->description }}
            </td>

            <!-- IP Address -->
            <td style="font-family: 'JetBrains Mono', monospace; font-size: 11.5px; color: var(--text-dim);">
              {{ $log->ip_address ?? '127.0.0.1' }}
            </td>

            <!-- Inspect Button -->
            <td style="text-align: right;">
              <button 
                type="button" 
                onclick="inspectLog({{ $log->id }})" 
                class="btn-saas btn-saas-secondary btn-saas-sm" 
                title="Inspect JSON Payload Diff"
              >
                <i class="fa-solid fa-code" style="font-size: 11px;"></i>
                <span>Inspect</span>
              </button>
            </td>
          </tr>
        @empty
          <tr>
            <td colspan="7" style="text-align: center; padding: 40px; color: var(--text-dim);">
              <i class="fa-solid fa-shield-halved" style="font-size: 30px; margin-bottom: 8px; opacity: 0.5;"></i>
              <p style="margin: 0;">No audit records found matching your filters.</p>
            </td>
          </tr>
        @endforelse
      </tbody>
    </table>
  </div>

  <!-- Pagination -->
  @if($logs->hasPages())
    <div style="padding: 16px 22px; border-top: 1px solid var(--border-color); display: flex; align-items: center; justify-content: space-between;">
      <div style="font-size: 12.5px; color: var(--text-dim);">
        Showing {{ $logs->firstItem() }} to {{ $logs->lastItem() }} of {{ $logs->total() }} audit records
      </div>
      <div>
        {{ $logs->links() }}
      </div>
    </div>
  @endif
</div>
@endsection
