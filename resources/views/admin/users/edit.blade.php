@extends('admin.layout.master')

@section('title', 'Edit User — ' . $user->name)

@section('breadcrumb')
  <a href="{{ admin_route('users.index') }}">Users Management</a>
  <span class="breadcrumb-sep">/</span>
  <span class="breadcrumb-active">Edit User</span>
@endsection

@section('content')
<div style="max-width: 860px; margin: 0 auto;">
  <!-- Header -->
  <div style="margin-bottom: 24px; display: flex; align-items: center; justify-content: space-between;">
    <div>
      <h1 style="font-size: 22px; font-weight: 800; color: #ffffff; letter-spacing: -0.02em; margin-bottom: 4px;">
        Edit User: {{ $user->name }}
      </h1>
      <p style="font-size: 13px; color: var(--text-muted); margin: 0;">
        Update account profile information, security credentials, and assigned roles.
      </p>
    </div>

    @if($user->isSuperAdmin())
      <span class="badge-pill badge-pill-gold">
        <i class="fa-solid fa-crown"></i>
        <span>Super Administrator</span>
      </span>
    @endif
  </div>

  <div class="saas-card">
    <form action="{{ admin_route('users.update', $user) }}" method="POST">
      @csrf
      @method('PUT')

      <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
        <!-- Full Name -->
        <div class="saas-form-group">
          <label class="saas-form-label" for="name">Full Name <span style="color: #fb7185;">*</span></label>
          <input 
            type="text" 
            name="name" 
            id="name" 
            class="saas-input" 
            value="{{ old('name', $user->name) }}" 
            required
          >
        </div>

        <!-- Email Address -->
        <div class="saas-form-group">
          <label class="saas-form-label" for="email">Email Address <span style="color: #fb7185;">*</span></label>
          <input 
            type="email" 
            name="email" 
            id="email" 
            class="saas-input" 
            value="{{ old('email', $user->email) }}" 
            required
          >
        </div>

        <!-- Phone Number -->
        <div class="saas-form-group">
          <label class="saas-form-label" for="phone">Contact Phone</label>
          <input 
            type="text" 
            name="phone" 
            id="phone" 
            class="saas-input" 
            value="{{ old('phone', $user->phone) }}"
          >
        </div>

        <!-- Active Status Switch -->
        <div class="saas-form-group">
          <label class="saas-form-label">Account Active State</label>
          <div style="padding-top: 10px;">
            <label style="display: inline-flex; align-items: center; gap: 10px; cursor: pointer; color: #cbd5e1; font-size: 13.5px;">
              <input 
                type="checkbox" 
                name="is_active" 
                value="1" 
                {{ old('is_active', $user->is_active) ? 'checked' : '' }} 
                {{ $user->id === Auth::id() ? 'disabled' : '' }}
                style="accent-color: var(--accent-indigo); width: 18px; height: 18px;"
              >
              <span>Account enabled for system sign-in</span>
            </label>
            @if($user->id === Auth::id())
              <div style="font-size: 11px; color: var(--text-dim); margin-top: 4px;">
                (You cannot deactivate your currently authenticated session account)
              </div>
            @endif
          </div>
        </div>

        <!-- Password (Optional) -->
        <div class="saas-form-group">
          <label class="saas-form-label" for="password">Change Password</label>
          <input 
            type="password" 
            name="password" 
            id="password" 
            class="saas-input" 
            placeholder="Leave blank to keep current password"
          >
        </div>

        <!-- Password Confirmation -->
        <div class="saas-form-group">
          <label class="saas-form-label" for="password_confirmation">Confirm New Password</label>
          <input 
            type="password" 
            name="password_confirmation" 
            id="password_confirmation" 
            class="saas-input" 
            placeholder="Repeat new password"
          >
        </div>
      </div>

      <!-- Roles Selection -->
      <div class="saas-form-group" style="margin-top: 10px;">
        <label class="saas-form-label">Assigned Roles <span style="color: #fb7185;">*</span></label>
        <p style="font-size: 12px; color: var(--text-dim); margin-top: -4px; margin-bottom: 12px;">
          Adjust the roles granted to this administrator.
        </p>

        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(240px, 1fr)); gap: 12px;">
          @foreach($roles as $role)
            @php
              $checked = in_array($role->id, old('roles', $assignedRoleIds));
            @endphp
            <label style="display: flex; align-items: flex-start; gap: 12px; padding: 14px; background: rgba(255, 255, 255, 0.02); border: 1px solid var(--border-color); border-radius: 10px; cursor: pointer;">
              <input 
                type="checkbox" 
                name="roles[]" 
                value="{{ $role->id }}" 
                {{ $checked ? 'checked' : '' }} 
                style="accent-color: var(--accent-indigo); width: 18px; height: 18px; margin-top: 2px;"
              >
              <div style="flex: 1;">
                <div style="font-weight: 700; color: #ffffff; font-size: 13.5px; display: flex; align-items: center; justify-content: space-between;">
                  <span>{{ $role->name }}</span>
                  @if($role->is_system)
                    <span class="badge-pill badge-pill-gold" style="font-size: 10px; padding: 2px 6px;">System</span>
                  @endif
                </div>
                <div style="font-size: 11.5px; color: var(--text-dim); margin-top: 4px;">
                  {{ $role->description ?? 'Standard role priority ' . $role->priority }}
                </div>
              </div>
            </label>
          @endforeach
        </div>
      </div>

      <!-- Actions -->
      <div style="display: flex; align-items: center; justify-content: flex-end; gap: 12px; margin-top: 30px; padding-top: 20px; border-top: 1px solid var(--border-color);">
        <a href="{{ admin_route('users.index') }}" class="btn-saas btn-saas-secondary">
          Cancel
        </a>
        <button type="submit" class="btn-saas btn-saas-primary">
          <i class="fa-solid fa-floppy-disk"></i>
          <span>Save Changes</span>
        </button>
      </div>
    </form>
  </div>
</div>
@endsection
