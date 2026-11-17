@extends('admin.layouts')
@section('title', 'Executive Dashboard')
@section('content')
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <div class="layout-page">
                <div class="container-fluid flex-grow-1 px-4 py-4">

                    <!-- =================================================================
                         1. HERO ACTION BANNER (ICRW Institutional Green & Gold Theme)
                         ================================================================= -->
                    @php
                        $hour = (int) now()->format('H');
                        $greeting = $hour < 12 ? 'Good morning' : ($hour < 17 ? 'Good afternoon' : 'Good evening');
                        $adminName = Auth::user()->name ?? 'Administrator';
                    @endphp

                    <div class="bz-hero-banner mb-4" style="background: linear-gradient(135deg, #06162e 0%, #092145 60%, #153452 100%); border-radius: 16px; padding: 32px; color: #fff; box-shadow: 0 10px 30px rgba(9, 33, 69, 0.25); border: 1px solid #153452;">
                        <div class="row align-items-center g-4">
                            <div class="col-12 col-lg-8 col-xl-9">
                                <div class="bz-hero-greeting text-uppercase fw-bold" style="font-size: 12px; letter-spacing: 1px; color: #c5a869;">
                                    {{ $greeting }}, {{ $adminName }}
                                </div>
                                <h1 class="bz-hero-headline fw-bolder mt-1 mb-2 text-white" style="font-size: 26px; letter-spacing: -0.5px;">
                                    ICRW Executive Governance & Portal Overview
                                </h1>
                                <p class="bz-hero-subtext mb-4 text-light" style="font-size: 13.5px; opacity: 0.9; max-width: 720px;">
                                    Institutional Role-Based Access Control (RBAC), multi-tier permissions, audit trail logging, and system health governance.
                                </p>
                                <div class="bz-hero-actions d-flex flex-wrap gap-2">
                                    @can_perm('users.view')
                                        <a href="{{ route('users.index') }}" class="btn btn-sm btn-light fw-bold text-dark d-inline-flex align-items-center gap-2 px-3 py-2" style="border-radius: 8px;">
                                            <i class="bx bx-user-pin fs-5 text-primary"></i>
                                            <span>Manage Users</span>
                                        </a>
                                    @endcan_perm
                                    @can_perm('roles.view')
                                        <a href="{{ route('roles') }}" class="btn btn-sm btn-outline-light d-inline-flex align-items-center gap-2 px-3 py-2" style="border-radius: 8px;">
                                            <i class="bx bx-shield-quarter fs-5"></i>
                                            <span>Roles & Matrix</span>
                                        </a>
                                    @endcan_perm
                                    @can_perm('logs.view')
                                        <a href="{{ route('logs.index') }}" class="btn btn-sm btn-outline-light d-inline-flex align-items-center gap-2 px-3 py-2" style="border-radius: 8px;">
                                            <i class="bx bx-history fs-5"></i>
                                            <span>Audit Trail</span>
                                        </a>
                                    @endcan_perm
                                    <a href="{{ route('clearcache') }}" class="btn btn-sm btn-outline-light d-inline-flex align-items-center gap-2 px-3 py-2" style="border-radius: 8px;">
                                        <i class="bx bx-refresh fs-5"></i>
                                        <span>Flush Cache</span>
                                    </a>
                                </div>
                            </div>
                            <div class="col-12 col-lg-4 col-xl-3 d-flex justify-content-lg-end justify-content-start">
                                <div class="p-3 rounded text-center" style="background: rgba(255,255,255,0.08); border: 1px solid rgba(255,255,255,0.15); min-width: 170px;">
                                    <div class="fs-2 fw-bolder text-warning">100%</div>
                                    <div class="small text-uppercase fw-semibold" style="letter-spacing: 0.5px; font-size: 11px;">RBAC Security Health</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- =================================================================
                         2. CORE STATS ROW (5 Metrics Driven by PostgreSQL)
                         ================================================================= -->
                    <div class="row g-3 mb-4">
                        <!-- Total Users -->
                        <div class="col-12 col-sm-6 col-xl">
                            <div class="card h-100 shadow-sm border-0" style="border-radius: 12px;">
                                <div class="card-body p-3">
                                    <div class="d-flex justify-content-between align-items-center mb-2">
                                        <span class="text-muted small fw-bold text-uppercase">Total Users</span>
                                        <div class="avatar bg-label-primary rounded p-2" style="width: 38px; height: 38px;">
                                            <i class="bx bx-user fs-5 text-primary"></i>
                                        </div>
                                    </div>
                                    <h3 class="fw-bold mb-1 text-dark">{{ number_format($stats['total_users'] ?? 0) }}</h3>
                                    <small class="text-muted">Registered in database</small>
                                </div>
                            </div>
                        </div>

                        <!-- Active Users -->
                        <div class="col-12 col-sm-6 col-xl">
                            <div class="card h-100 shadow-sm border-0" style="border-radius: 12px;">
                                <div class="card-body p-3">
                                    <div class="d-flex justify-content-between align-items-center mb-2">
                                        <span class="text-muted small fw-bold text-uppercase">Active Admins</span>
                                        <div class="avatar bg-label-success rounded p-2" style="width: 38px; height: 38px;">
                                            <i class="bx bx-check-shield fs-5 text-success"></i>
                                        </div>
                                    </div>
                                    <h3 class="fw-bold mb-1 text-success">{{ number_format($stats['active_users'] ?? 0) }}</h3>
                                    <small class="text-muted">Enabled sign-in access</small>
                                </div>
                            </div>
                        </div>

                        <!-- Configured Roles -->
                        <div class="col-12 col-sm-6 col-xl">
                            <div class="card h-100 shadow-sm border-0" style="border-radius: 12px;">
                                <div class="card-body p-3">
                                    <div class="d-flex justify-content-between align-items-center mb-2">
                                        <span class="text-muted small fw-bold text-uppercase">Roles</span>
                                        <div class="avatar bg-label-warning rounded p-2" style="width: 38px; height: 38px;">
                                            <i class="bx bx-shield-quarter fs-5 text-warning"></i>
                                        </div>
                                    </div>
                                    <h3 class="fw-bold mb-1 text-dark">{{ number_format($stats['total_roles'] ?? 0) }}</h3>
                                    <small class="text-muted">Security authority tiers</small>
                                </div>
                            </div>
                        </div>

                        <!-- System Permissions -->
                        <div class="col-12 col-sm-6 col-xl">
                            <div class="card h-100 shadow-sm border-0" style="border-radius: 12px;">
                                <div class="card-body p-3">
                                    <div class="d-flex justify-content-between align-items-center mb-2">
                                        <span class="text-muted small fw-bold text-uppercase">Permissions</span>
                                        <div class="avatar bg-label-info rounded p-2" style="width: 38px; height: 38px;">
                                            <i class="bx bx-key fs-5 text-info"></i>
                                        </div>
                                    </div>
                                    <h3 class="fw-bold mb-1 text-dark">{{ number_format($stats['total_permissions'] ?? 0) }}</h3>
                                    <small class="text-muted">Granular module gates</small>
                                </div>
                            </div>
                        </div>

                        <!-- Audit Logs -->
                        <div class="col-12 col-sm-6 col-xl">
                            <div class="card h-100 shadow-sm border-0" style="border-radius: 12px;">
                                <div class="card-body p-3">
                                    <div class="d-flex justify-content-between align-items-center mb-2">
                                        <span class="text-muted small fw-bold text-uppercase">Activity Logs</span>
                                        <div class="avatar bg-label-danger rounded p-2" style="width: 38px; height: 38px;">
                                            <i class="bx bx-history fs-5 text-danger"></i>
                                        </div>
                                    </div>
                                    <h3 class="fw-bold mb-1 text-dark">{{ number_format($stats['total_logs'] ?? 0) }}</h3>
                                    <small class="text-muted">Security events logged</small>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- =================================================================
                         3. DUAL SECTION: RECENT ACTIVITY AUDIT & ROLES DISTRIBUTION
                         ================================================================= -->
                    <div class="row g-4">
                        <!-- Recent Activity Logs Table -->
                        <div class="col-12 col-lg-8">
                            <div class="card shadow-sm border-0 h-100" style="border-radius: 12px;">
                                <div class="card-header d-flex justify-content-between align-items-center bg-white border-bottom py-3">
                                    <h5 class="card-title mb-0 fw-bold text-dark d-flex align-items-center gap-2">
                                        <i class="bx bx-list-check text-primary fs-4"></i>
                                        <span>Recent Administrative Activity</span>
                                    </h5>
                                    @can_perm('logs.view')
                                        <a href="{{ route('logs.index') }}" class="btn btn-sm btn-outline-primary">
                                            View Full Audit Trail &rarr;
                                        </a>
                                    @endcan_perm
                                </div>

                                <div class="table-responsive">
                                    <table class="table table-hover align-middle mb-0">
                                        <thead class="table-light">
                                            <tr class="small text-uppercase text-muted">
                                                <th>Operator</th>
                                                <th>Module</th>
                                                <th>Action</th>
                                                <th>Description</th>
                                                <th>Time</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse($recentLogs as $log)
                                                <tr>
                                                    <td>
                                                        <div class="d-flex align-items-center gap-2">
                                                            <div class="avatar bg-label-primary rounded-circle d-flex align-items-center justify-content-center" style="width: 32px; height: 32px; font-weight: 700; font-size: 12px;">
                                                                {{ strtoupper(substr($log->user->name ?? 'S', 0, 1)) }}
                                                            </div>
                                                            <div>
                                                                <div class="fw-bold text-dark small">{{ $log->user->name ?? 'System' }}</div>
                                                                <small class="text-muted" style="font-size: 11px;">{{ $log->ip_address }}</small>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <span class="badge bg-label-info text-capitalize">{{ $log->module }}</span>
                                                    </td>
                                                    <td>
                                                        @php
                                                            $badgeClass = match(strtoupper($log->action)) {
                                                                'CREATE' => 'bg-label-success',
                                                                'UPDATE' => 'bg-label-primary',
                                                                'DELETE' => 'bg-label-danger',
                                                                'LOGIN'  => 'bg-label-info',
                                                                'CACHE_CLEAR' => 'bg-label-warning',
                                                                default  => 'bg-label-secondary',
                                                            };
                                                        @endphp
                                                        <span class="badge {{ $badgeClass }}">{{ $log->action }}</span>
                                                    </td>
                                                    <td class="small text-dark" style="max-width: 280px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;" title="{{ $log->description }}">
                                                        {{ $log->description }}
                                                    </td>
                                                    <td class="small text-muted text-nowrap">
                                                        {{ $log->created_at->diffForHumans() }}
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="5" class="text-center py-4 text-muted">
                                                        No activity logs recorded yet.
                                                    </td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <!-- Roles Distribution & Quick Overview -->
                        <div class="col-12 col-lg-4">
                            <div class="card shadow-sm border-0 mb-4" style="border-radius: 12px;">
                                <div class="card-header bg-white border-bottom py-3 d-flex justify-content-between align-items-center">
                                    <h5 class="card-title mb-0 fw-bold text-dark d-flex align-items-center gap-2">
                                        <i class="bx bx-shield-quarter text-warning fs-4"></i>
                                        <span>Roles Overview</span>
                                    </h5>
                                    @can_perm('roles.view')
                                        <a href="{{ route('roles') }}" class="small fw-bold text-primary">Manage</a>
                                    @endcan_perm
                                </div>
                                <div class="card-body p-3">
                                    <div class="d-flex flex-column gap-2">
                                        @foreach($rolesDistribution as $role)
                                            <div class="d-flex justify-content-between align-items-center p-2 rounded border bg-light">
                                                <div>
                                                    <div class="fw-bold text-dark small">{{ $role->name }}</div>
                                                    <small class="text-muted" style="font-size: 11px;">Priority {{ $role->priority }}</small>
                                                </div>
                                                <span class="badge bg-primary rounded-pill">{{ $role->users_count }} Users</span>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>

                            <!-- Recent Users Card -->
                            <div class="card shadow-sm border-0" style="border-radius: 12px;">
                                <div class="card-header bg-white border-bottom py-3 d-flex justify-content-between align-items-center">
                                    <h5 class="card-title mb-0 fw-bold text-dark d-flex align-items-center gap-2">
                                        <i class="bx bx-user text-primary fs-4"></i>
                                        <span>Recent Administrators</span>
                                    </h5>
                                    @can_perm('users.view')
                                        <a href="{{ route('users.index') }}" class="small fw-bold text-primary">All Users</a>
                                    @endcan_perm
                                </div>
                                <div class="card-body p-3">
                                    <div class="d-flex flex-column gap-3">
                                        @foreach($recentUsers as $user)
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div class="d-flex align-items-center gap-2">
                                                    <div class="avatar bg-label-primary rounded-circle d-flex align-items-center justify-content-center" style="width: 32px; height: 32px; font-weight: 700; font-size: 12px;">
                                                        {{ strtoupper(substr($user->name, 0, 1)) }}
                                                    </div>
                                                    <div>
                                                        <div class="fw-bold text-dark small">{{ $user->name }}</div>
                                                        <small class="text-muted d-block" style="font-size: 11px;">{{ $user->email }}</small>
                                                    </div>
                                                </div>
                                                @if($user->is_active)
                                                    <span class="badge bg-label-success">Active</span>
                                                @else
                                                    <span class="badge bg-label-danger">Inactive</span>
                                                @endif
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
