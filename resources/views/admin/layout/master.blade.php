<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>@yield('title', 'Dashboard') — ICRW Executive Portal</title>

  <!-- Google Fonts (Plus Jakarta Sans & Inter) -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=JetBrains+Mono:wght@400;500&display=swap" rel="stylesheet">

  <!-- Font Awesome 6.5.1 CDN -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

  <!-- Admin SaaS Theme Stylesheet -->
  <link rel="stylesheet" href="{{ asset('admin/css/admin.css?v=1.1') }}">

  <!-- Favicon -->
  <link rel="shortcut icon" href="{{ asset('index/welcome/logo.png') }}" type="image/png">
  <link rel="icon" href="{{ asset('index/welcome/logo.png') }}" type="image/png">

  @stack('styles')
</head>
<body class="admin-body">
  <div class="admin-wrapper">

    <!-- ========================================================
         SIDEBAR NAVIGATION (Matches User Reference Architecture)
         ======================================================== -->
    <aside class="admin-sidebar" id="adminSidebar">
      <!-- Brand Header -->
      <a href="{{ admin_route('dashboard') }}" class="sidebar-brand">
        <img src="{{ asset('index/welcome/logo.png') }}" alt="ICRW Seal">
        <div class="sidebar-brand-text">
          <span class="sidebar-brand-title">ICRW PORTAL</span>
          <span class="sidebar-brand-subtitle">EXECUTIVE SAAS</span>
        </div>
      </a>

      <!-- Menu Navigation -->
      <div class="sidebar-menu-wrap">
        <!-- Main Dashboard -->
        <a href="{{ admin_route('dashboard') }}" class="sidebar-link {{ is_admin_active('dashboard') ? 'active' : '' }}">
          <span class="icon-box"><i class="fa-solid fa-gauge-high"></i></span>
          <span>Dashboard</span>
        </a>

        <!-- USERS MANAGEMENT Section -->
        @can_perm('users.view')
        <div class="menu-section-header">Users Management</div>
        <a href="{{ admin_route('users.index') }}" class="sidebar-link {{ is_admin_active('users.*') ? 'active' : '' }}">
          <span class="icon-box"><i class="fa-regular fa-user"></i></span>
          <span>View Users</span>
        </a>
        @endcan_perm

        <!-- ROLES MANAGEMENT Section -->
        @can_perm('roles.view')
        <div class="menu-section-header">Roles Management</div>
        <a href="{{ admin_route('roles.index') }}" class="sidebar-link {{ is_admin_active('roles.*') ? 'active' : '' }}">
          <span class="icon-box"><i class="fa-solid fa-shield-halved"></i></span>
          <span>View Roles</span>
        </a>
        @endcan_perm

        <!-- PERMISSIONS MANAGEMENT Section -->
        @can_perm('permissions.view')
        <div class="menu-section-header">Permissions Management</div>
        <a href="{{ admin_route('permissions.index') }}" class="sidebar-link {{ is_admin_active('permissions.*') ? 'active' : '' }}">
          <span class="icon-box"><i class="fa-solid fa-lock"></i></span>
          <span>View Permissions</span>
        </a>
        @endcan_perm

        <!-- AUDIT TRAIL / LOGS Section -->
        @can_perm('logs.view')
        <div class="menu-section-header">Audit Trail / Logs</div>
        <a href="{{ admin_route('logs.index') }}" class="sidebar-link {{ is_admin_active('logs.*') ? 'active' : '' }}">
          <span class="icon-box"><i class="fa-solid fa-clock-rotate-left"></i></span>
          <span>Activity Logs</span>
        </a>
        @endcan_perm

        <!-- CACHE CLEAR Section -->
        @can_perm('system.cache_clear')
        <div class="menu-section-header">Cache Clear</div>
        <a href="javascript:void(0)" onclick="executeSystemCacheClear()" class="sidebar-link" id="cacheClearBtn" title="Purge route, view, and config caches">
          <span class="icon-box"><i class="fa-solid fa-arrows-rotate" id="cacheSpinIcon"></i></span>
          <span>Cache Clear</span>
        </a>
        @endcan_perm
      </div>

      <!-- Sidebar User Footer -->
      <div class="sidebar-footer">
        <div class="user-profile-badge">
          <div class="user-avatar-circle">
            {{ strtoupper(substr(Auth::user()->name ?? 'A', 0, 1)) }}
          </div>
          <div style="flex: 1; min-width: 0;">
            <div class="user-meta-name" style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
              {{ Auth::user()->name ?? 'Administrator' }}
            </div>
            <div class="user-meta-role">
              {{ Auth::user()->roles->first()->name ?? 'Administrator' }}
            </div>
          </div>
          <form action="{{ admin_route('logout') }}" method="POST" style="margin: 0;">
            @csrf
            <button type="submit" class="btn-saas btn-saas-secondary btn-saas-sm" style="padding: 6px 10px;" title="Secure Sign Out">
              <i class="fa-solid fa-right-from-bracket"></i>
            </button>
          </form>
        </div>
      </div>
    </aside>

    <!-- ========================================================
         MAIN PORTAL LAYOUT
         ======================================================== -->
    <div class="admin-main">
      <!-- Topbar Header -->
      <header class="admin-topbar">
        <div style="display: flex; align-items: center; gap: 14px;">
          <!-- Mobile Sidebar Toggle -->
          <button type="button" class="btn-saas btn-saas-secondary btn-saas-sm" id="sidebarToggleBtn" style="display: none;">
            <i class="fa-solid fa-bars"></i>
          </button>

          <!-- Breadcrumbs Trail -->
          <nav class="breadcrumb-trail">
            <a href="{{ admin_route('dashboard') }}"><i class="fa-solid fa-house" style="font-size: 11px;"></i></a>
            <span class="breadcrumb-sep">/</span>
            @yield('breadcrumb')
          </nav>
        </div>

        <!-- Topbar Right Actions -->
        <div class="topbar-actions">
          <!-- Direct Link to Live Web Portal -->
          <a href="{{ route('home') }}" target="_blank" class="btn-saas btn-saas-secondary btn-saas-sm">
            <i class="fa-solid fa-arrow-up-right-from-square" style="font-size: 11px;"></i>
            <span>View Public Site</span>
          </a>

          <!-- Live DB / Environment Pill -->
          <span class="badge-pill badge-pill-indigo" style="font-size: 11px;">
            <span class="badge-dot" style="background: #34d399;"></span>
            PostgreSQL Active
          </span>
        </div>
      </header>

      <!-- Main Body Container -->
      <main class="admin-content">
        <!-- Flash Notifications -->
        @if(session('success'))
          <div style="background: rgba(16, 185, 129, 0.12); border: 1px solid rgba(16, 185, 129, 0.3); border-radius: 10px; padding: 14px 18px; margin-bottom: 22px; display: flex; align-items: center; justify-content: space-between; color: #34d399; font-size: 13.5px;">
            <div style="display: flex; align-items: center; gap: 10px;">
              <i class="fa-solid fa-circle-check" style="font-size: 16px;"></i>
              <span>{{ session('success') }}</span>
            </div>
            <button type="button" onclick="this.parentElement.remove()" style="background: none; border: none; color: #34d399; cursor: pointer; font-size: 14px;">&times;</button>
          </div>
        @endif

        @if(session('error'))
          <div style="background: rgba(244, 63, 94, 0.12); border: 1px solid rgba(244, 63, 94, 0.3); border-radius: 10px; padding: 14px 18px; margin-bottom: 22px; display: flex; align-items: center; justify-content: space-between; color: #fb7185; font-size: 13.5px;">
            <div style="display: flex; align-items: center; gap: 10px;">
              <i class="fa-solid fa-triangle-exclamation" style="font-size: 16px;"></i>
              <span>{{ session('error') }}</span>
            </div>
            <button type="button" onclick="this.parentElement.remove()" style="background: none; border: none; color: #fb7185; cursor: pointer; font-size: 14px;">&times;</button>
          </div>
        @endif

        @if(session('info'))
          <div style="background: rgba(14, 165, 233, 0.12); border: 1px solid rgba(14, 165, 233, 0.3); border-radius: 10px; padding: 14px 18px; margin-bottom: 22px; display: flex; align-items: center; justify-content: space-between; color: #38bdf8; font-size: 13.5px;">
            <div style="display: flex; align-items: center; gap: 10px;">
              <i class="fa-solid fa-circle-info" style="font-size: 16px;"></i>
              <span>{{ session('info') }}</span>
            </div>
            <button type="button" onclick="this.parentElement.remove()" style="background: none; border: none; color: #38bdf8; cursor: pointer; font-size: 14px;">&times;</button>
          </div>
        @endif

        @if($errors->any())
          <div style="background: rgba(244, 63, 94, 0.12); border: 1px solid rgba(244, 63, 94, 0.3); border-radius: 10px; padding: 14px 18px; margin-bottom: 22px; color: #fb7185; font-size: 13.5px;">
            <div style="font-weight: 700; margin-bottom: 6px; display: flex; align-items: center; gap: 8px;">
              <i class="fa-solid fa-circle-xmark"></i> Validation Warnings Encountered:
            </div>
            <ul style="margin: 0; padding-left: 24px;">
              @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
        @endif

        <!-- Injected View Content -->
        @yield('content')
      </main>
    </div>
  </div>

  <!-- ========================================================
       ACTIVITY LOG JSON DIFF MODAL (Global Inspector)
       ======================================================== -->
  <div class="saas-modal-backdrop" id="logInspectModal">
    <div class="saas-modal" style="max-width: 780px;">
      <div class="saas-modal-header">
        <div style="display: flex; align-items: center; gap: 10px;">
          <div class="icon-box" style="width: 32px; height: 32px; border-radius: 8px; background: rgba(99, 102, 241, 0.15); color: #818cf8; display: flex; align-items: center; justify-content: center;">
            <i class="fa-solid fa-code"></i>
          </div>
          <div>
            <div class="saas-modal-title" id="logModalTitle">Audit Log Record Inspector</div>
            <div style="font-size: 11px; color: var(--text-dim);" id="logModalMeta">—</div>
          </div>
        </div>
        <button type="button" onclick="closeLogModal()" style="background: none; border: none; color: #94a3b8; font-size: 20px; cursor: pointer;">&times;</button>
      </div>

      <div class="saas-modal-body">
        <div style="margin-bottom: 16px;">
          <div style="font-size: 11px; font-weight: 700; text-transform: uppercase; letter-spacing: 0.05em; color: var(--text-dim); margin-bottom: 6px;">Event Description</div>
          <div id="logModalDesc" style="font-size: 13.5px; color: #ffffff; padding: 10px 14px; background: rgba(0,0,0,0.25); border-radius: 8px; border: 1px solid var(--border-color);"></div>
        </div>

        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 16px;" id="diffGrid">
          <div>
            <div style="font-size: 11px; font-weight: 700; text-transform: uppercase; letter-spacing: 0.05em; color: #fb7185; margin-bottom: 6px; display: flex; align-items: center; gap: 6px;">
              <i class="fa-solid fa-minus"></i> Prior State (Old Values)
            </div>
            <pre id="logOldValues" style="background: #090d16; border: 1px solid rgba(244, 63, 94, 0.2); border-radius: 8px; padding: 12px; font-family: 'JetBrains Mono', monospace; font-size: 11.5px; color: #cbd5e1; max-height: 260px; overflow-y: auto; white-space: pre-wrap; margin: 0;"></pre>
          </div>

          <div>
            <div style="font-size: 11px; font-weight: 700; text-transform: uppercase; letter-spacing: 0.05em; color: #34d399; margin-bottom: 6px; display: flex; align-items: center; gap: 6px;">
              <i class="fa-solid fa-plus"></i> Mutated State (New Values)
            </div>
            <pre id="logNewValues" style="background: #090d16; border: 1px solid rgba(16, 185, 129, 0.2); border-radius: 8px; padding: 12px; font-family: 'JetBrains Mono', monospace; font-size: 11.5px; color: #cbd5e1; max-height: 260px; overflow-y: auto; white-space: pre-wrap; margin: 0;"></pre>
          </div>
        </div>
      </div>

      <div class="saas-modal-footer">
        <button type="button" onclick="closeLogModal()" class="btn-saas btn-saas-secondary">Close Inspector</button>
      </div>
    </div>
  </div>

  <!-- ========================================================
       TOAST NOTIFICATION CONTAINER (AJAX Feedback)
       ======================================================== -->
  <div id="saasToastContainer" style="position: fixed; bottom: 24px; right: 24px; z-index: 999; display: flex; flex-direction: column; gap: 10px; max-width: 380px;"></div>

  <!-- Global JavaScript Core -->
  <script>
    // Mobile Sidebar Toggler
    const sidebar = document.getElementById('adminSidebar');
    const toggleBtn = document.getElementById('sidebarToggleBtn');
    if (window.innerWidth <= 991 && toggleBtn) {
      toggleBtn.style.display = 'inline-flex';
      toggleBtn.addEventListener('click', () => {
        sidebar.classList.toggle('show');
      });
    }

    // Toast Generator
    function showToast(message, type = 'success') {
      const container = document.getElementById('saasToastContainer');
      const toast = document.createElement('div');
      
      const isSuccess = type === 'success';
      const bgColor = isSuccess ? '#0d1d1f' : '#231219';
      const borderColor = isSuccess ? '#10b981' : '#f43f5e';
      const textColor = isSuccess ? '#34d399' : '#fb7185';
      const icon = isSuccess ? 'fa-circle-check' : 'fa-circle-xmark';

      toast.style.cssText = `
        background: ${bgColor};
        border: 1px solid ${borderColor};
        color: ${textColor};
        padding: 14px 18px;
        border-radius: 10px;
        font-size: 13px;
        font-weight: 500;
        display: flex;
        align-items: center;
        gap: 12px;
        box-shadow: 0 10px 25px rgba(0,0,0,0.5);
        opacity: 0;
        transform: translateY(10px);
        transition: all 0.25s ease;
      `;

      toast.innerHTML = `
        <i class="fa-solid ${icon}" style="font-size: 16px;"></i>
        <span style="flex: 1;">${message}</span>
        <button type="button" style="background: none; border: none; color: ${textColor}; cursor: pointer; font-size: 16px;" onclick="this.parentElement.remove()">&times;</button>
      `;

      container.appendChild(toast);
      setTimeout(() => {
        toast.style.opacity = '1';
        toast.style.transform = 'translateY(0)';
      }, 10);

      setTimeout(() => {
        toast.style.opacity = '0';
        toast.style.transform = 'translateY(10px)';
        setTimeout(() => toast.remove(), 250);
      }, 4000);
    }

    // AJAX System Cache Clear
    function executeSystemCacheClear() {
      const btn = document.getElementById('cacheClearBtn');
      const icon = document.getElementById('cacheSpinIcon');
      if (!btn || !icon) return;

      icon.classList.add('fa-spin');
      btn.style.pointerEvents = 'none';

      fetch("{{ admin_route('cache.clear') }}", {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
          'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
          'Accept': 'application/json'
        }
      })
      .then(res => res.json())
      .then(data => {
        icon.classList.remove('fa-spin');
        btn.style.pointerEvents = 'auto';
        if (data.success) {
          showToast(data.message || 'System cache purged successfully.', 'success');
        } else {
          showToast(data.message || 'Unable to purge cache.', 'error');
        }
      })
      .catch(err => {
        icon.classList.remove('fa-spin');
        btn.style.pointerEvents = 'auto';
        showToast('System error clearing application cache.', 'error');
      });
    }

    // Log Inspector Modal Populator
    function inspectLog(logId) {
      const modal = document.getElementById('logInspectModal');
      const meta = document.getElementById('logModalMeta');
      const desc = document.getElementById('logModalDesc');
      const oldVal = document.getElementById('logOldValues');
      const newVal = document.getElementById('logNewValues');

      meta.textContent = 'Loading audit record payload...';
      desc.textContent = 'Fetching details...';
      oldVal.textContent = '...';
      newVal.textContent = '...';
      modal.classList.add('active');

      const urlTemplate = "{{ admin_route('logs.show', ['log' => ':id']) }}";
      const fetchUrl = urlTemplate.replace(':id', logId);

      fetch(fetchUrl, {
        headers: {
          'Accept': 'application/json'
        }
      })
      .then(r => r.json())
      .then(data => {
        meta.textContent = `Operator: ${data.user} • Timestamp: ${data.created_at} • IP: ${data.ip_address}`;
        desc.textContent = data.description || 'No description provided.';
        oldVal.textContent = data.old_values ? JSON.stringify(data.old_values, null, 2) : 'None (Record was created afresh or no prior state)';
        newVal.textContent = data.new_values ? JSON.stringify(data.new_values, null, 2) : 'None (Record was deleted or no mutation payload)';
      })
      .catch(() => {
        meta.textContent = 'Error loading audit record.';
        desc.textContent = 'Failed to load details.';
      });
    }

    function closeLogModal() {
      document.getElementById('logInspectModal').classList.remove('active');
    }

    // Close modal on backdrop click
    document.getElementById('logInspectModal').addEventListener('click', (e) => {
      if (e.target.id === 'logInspectModal') {
        closeLogModal();
      }
    });
  </script>

  @stack('scripts')
</body>
</html>
