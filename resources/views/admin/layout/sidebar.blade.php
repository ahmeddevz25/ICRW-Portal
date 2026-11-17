<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme saas-sidebar">

    <!-- SAAS BRAND HEADER -->
    <div class="saas-brand-header">
        <a href="{{ route('dashboard') }}" class="saas-brand-link">
            <div class="saas-brand-logo-container">
                <img src="{{ asset('index/welcome/logo.png') }}" alt="ICRW Logo" class="saas-brand-img">
            </div>
            <div class="saas-brand-details">
                <div class="saas-brand-name">ICRW Portal</div>
                <div class="saas-brand-status">
                    <span class="saas-pulse-dot"></span>
                    <span class="saas-status-text">Executive • Active</span>
                </div>
            </div>
        </a>

        <a href="javascript:void(0);" id="saas-sidebar-toggle" class="saas-toggle-btn" title="Toggle Sidebar">
            <i class="bx bx-chevron-left bx-sm align-middle" id="saas-sidebar-toggle-icon"></i>
        </a>
    </div>

    <!-- SIDEBAR MENU SCROLLABLE BODY -->
    <ul class="menu-inner py-1 saas-menu-inner">

        <!-- SECTION: MAIN -->
        <li class="saas-section-header">
            <span class="saas-header-text">MAIN</span>
            <span class="saas-header-line"></span>
        </li>

        <!-- Dashboard -->
        <li class="menu-item saas-menu-item {{ request()->routeIs('dashboard') || request()->routeIs('admin.dashboard') ? 'active' : '' }}" data-title="Dashboard">
            <a href="{{ route('dashboard') }}" class="menu-link" title="Dashboard">
                <span class="saas-icon-badge icon-badge-emerald">
                    <i class="bx bx-grid-alt"></i>
                </span>
                <span class="saas-link-text">Dashboard</span>
                <span class="saas-active-pill"></span>
            </a>
        </li>

        <!-- SECTION: ACCESS CONTROL -->
        <li class="saas-section-header">
            <span class="saas-header-text">ACCESS CONTROL</span>
            <span class="saas-header-line"></span>
        </li>

        {{-- Users --}}
        @can_perm('users.view')
            <li class="menu-item saas-menu-item {{ request()->routeIs('users.*') ? 'active' : '' }}" data-title="Users">
                <a href="{{ route('users.index') }}" class="menu-link" title="Users">
                    <span class="saas-icon-badge icon-badge-blue">
                        <i class="bx bx-user-pin"></i>
                    </span>
                    <span class="saas-link-text">Users</span>
                    <span class="saas-active-pill"></span>
                </a>
            </li>
        @endcan_perm

        {{-- Roles --}}
        @can_perm('roles.view')
            <li class="menu-item saas-menu-item {{ request()->routeIs('roles*') ? 'active' : '' }}" data-title="Roles">
                <a href="{{ route('roles') }}" class="menu-link" title="Roles">
                    <span class="saas-icon-badge icon-badge-indigo">
                        <i class="bx bx-shield-quarter"></i>
                    </span>
                    <span class="saas-link-text">Roles</span>
                    <span class="saas-active-pill"></span>
                </a>
            </li>
        @endcan_perm

        {{-- Permissions --}}
        @can_perm('permissions.view')
            <li class="menu-item saas-menu-item {{ request()->routeIs('permissions*') ? 'active' : '' }}" data-title="Permissions">
                <a href="{{ route('permissions') }}" class="menu-link" title="Permissions">
                    <span class="saas-icon-badge icon-badge-pink">
                        <i class="bx bx-key"></i>
                    </span>
                    <span class="saas-link-text">Permissions</span>
                    <span class="saas-active-pill"></span>
                </a>
            </li>
        @endcan_perm

        <!-- SECTION: AUDIT & SYSTEM PREFERENCES -->
        <li class="saas-section-header">
            <span class="saas-header-text">SYSTEM</span>
            <span class="saas-header-line"></span>
        </li>

        {{-- Activity Logs --}}
        @can_perm('logs.view')
            <li class="menu-item saas-menu-item {{ request()->routeIs('logs.*') ? 'active' : '' }}" data-title="Activity Logs">
                <a href="{{ route('logs.index') }}" class="menu-link" title="Activity Logs">
                    <span class="saas-icon-badge icon-badge-teal">
                        <i class="bx bx-history"></i>
                    </span>
                    <span class="saas-link-text">Activity Logs</span>
                    <span class="saas-active-pill"></span>
                </a>
            </li>
        @endcan_perm

        {{-- Cache Clear --}}
        <li class="menu-item saas-menu-item {{ request()->routeIs('clearcache') ? 'active' : '' }}" data-title="Cache Clear">
            <a href="{{ route('clearcache') }}" class="menu-link" title="Cache Clear">
                <span class="saas-icon-badge icon-badge-cyan">
                    <i class="bx bx-refresh"></i>
                </span>
                <span class="saas-link-text">Cache Clear</span>
                <span class="saas-active-pill"></span>
            </a>
        </li>

    </ul>

    <!-- SAAS SIDEBAR FOOTER (USER & SYSTEM CARD) -->
    <div class="saas-sidebar-footer">
        <div class="saas-user-card" title="{{ Auth::user()->name ?? 'Administrator' }} ({{ Auth::user()->roles->first()->name ?? 'Administrator' }})">
            <div class="saas-user-avatar-wrap">
                <div class="saas-user-avatar" style="background: linear-gradient(135deg, #092145, #c5a869); color: #fff;">
                    {{ strtoupper(substr(Auth::user()->name ?? 'AD', 0, 2)) }}
                </div>
                <span class="saas-avatar-dot"></span>
            </div>
            <div class="saas-user-details">
                <div class="saas-user-name" title="{{ Auth::user()->name ?? 'Administrator' }}">
                    {{ Auth::user()->name ?? 'Administrator' }}
                </div>
                <div class="saas-user-subtitle">
                    {{ Auth::user()->roles->first()->name ?? 'Administrator' }}
                </div>
            </div>
            <div class="saas-footer-actions">
                <a href="{{ route('home') }}" target="_blank" class="saas-footer-icon-btn" title="View Public Website">
                    <i class="bx bx-globe"></i>
                </a>
                <form action="{{ route('logout') }}" method="POST" class="m-0 p-0 d-inline">
                    @csrf
                    <button type="submit" class="saas-footer-icon-btn text-danger" title="Logout" style="border: none; background: transparent; cursor: pointer;">
                        <i class="bx bx-log-out"></i>
                    </button>
                </form>
            </div>
        </div>
    </div>

</aside>
