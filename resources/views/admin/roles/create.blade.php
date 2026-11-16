@extends('admin.layout.master')

@section('title', 'Create Administrative Role')

@section('breadcrumb')
  <a href="{{ admin_route('roles.index') }}">Roles Management</a>
  <span class="breadcrumb-sep">/</span>
  <span class="breadcrumb-active">Create Role</span>
@endsection

@section('content')
<div style="max-width: 980px; margin: 0 auto;">
  <!-- Header -->
  <div style="margin-bottom: 24px;">
    <h1 style="font-size: 22px; font-weight: 800; color: #ffffff; letter-spacing: -0.02em; margin-bottom: 4px;">
      Create Administrative Role
    </h1>
    <p style="font-size: 13px; color: var(--text-muted); margin: 0;">
      Define an authority level and configure modular permission bundles.
    </p>
  </div>

  <form action="{{ admin_route('roles.store') }}" method="POST">
    @csrf

    <!-- Role Metadata Card -->
    <div class="saas-card" style="margin-bottom: 24px;">
      <div class="saas-card-title" style="margin-bottom: 18px;">
        <i class="fa-solid fa-id-badge" style="color: var(--accent-indigo);"></i>
        <span>Role Details</span>
      </div>

      <div style="display: grid; grid-template-columns: 2fr 1fr; gap: 20px;">
        <div class="saas-form-group">
          <label class="saas-form-label" for="name">Role Title <span style="color: #fb7185;">*</span></label>
          <input 
            type="text" 
            name="name" 
            id="name" 
            class="saas-input" 
            placeholder="e.g. Editorial Coordinator" 
            value="{{ old('name') }}" 
            required
          >
        </div>

        <div class="saas-form-group">
          <label class="saas-form-label" for="priority">Priority Index</label>
          <input 
            type="number" 
            name="priority" 
            id="priority" 
            class="saas-input" 
            value="{{ old('priority', 10) }}" 
            min="0"
          >
        </div>
      </div>

      <div class="saas-form-group" style="margin-bottom: 0;">
        <label class="saas-form-label" for="description">Functional Description</label>
        <textarea 
          name="description" 
          id="description" 
          rows="2" 
          class="saas-input" 
          placeholder="Briefly state the institutional scope and responsibility of this role..."
        >{{ old('description') }}</textarea>
      </div>
    </div>

    <!-- Permissions Matrix Card -->
    <div class="saas-card">
      <div class="saas-card-header" style="margin-bottom: 16px;">
        <div class="saas-card-title">
          <i class="fa-solid fa-lock" style="color: var(--accent-gold);"></i>
          <span>Assign Modular Permissions</span>
        </div>
        <button type="button" onclick="toggleAllPermissions(true)" class="btn-saas btn-saas-secondary btn-saas-sm">
          <i class="fa-solid fa-check-double"></i>
          <span>Check All</span>
        </button>
      </div>

      <p style="font-size: 12.5px; color: var(--text-dim); margin-top: -8px; margin-bottom: 22px;">
        Tick the granular capabilities this role is authorized to perform within each module.
      </p>

      <div style="display: flex; flex-direction: column; gap: 20px;">
        @foreach($modules as $moduleName => $permissions)
          <div style="background: rgba(255, 255, 255, 0.02); border: 1px solid var(--border-color); border-radius: 12px; padding: 18px;">
            <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 14px; border-bottom: 1px solid rgba(255,255,255,0.05); padding-bottom: 10px;">
              <div style="font-size: 13.5px; font-weight: 700; color: #ffffff; text-transform: uppercase; letter-spacing: 0.05em; display: flex; align-items: center; gap: 8px;">
                <span style="width: 8px; height: 8px; border-radius: 50%; background: var(--accent-indigo);"></span>
                <span>{{ $moduleName }} Module</span>
              </div>
              <button type="button" onclick="toggleModuleGroup('module_{{ Str::slug($moduleName) }}')" class="btn-saas btn-saas-secondary btn-saas-sm" style="font-size: 11px; padding: 3px 8px;">
                Toggle Group
              </button>
            </div>

            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 12px;" class="module_{{ Str::slug($moduleName) }}">
              @foreach($permissions as $perm)
                <label style="display: flex; align-items: flex-start; gap: 10px; padding: 10px 12px; background: rgba(0,0,0,0.2); border: 1px solid var(--border-color); border-radius: 8px; cursor: pointer;">
                  <input 
                    type="checkbox" 
                    name="permissions[]" 
                    value="{{ $perm->id }}" 
                    class="perm-checkbox perm-group-{{ Str::slug($moduleName) }}"
                    {{ in_array($perm->id, old('permissions', [])) ? 'checked' : '' }} 
                    style="accent-color: var(--accent-indigo); width: 16px; height: 16px; margin-top: 2px;"
                  >
                  <div>
                    <div style="font-size: 13px; font-weight: 600; color: #ffffff;">
                      {{ $perm->name }}
                    </div>
                    <div style="font-size: 11px; color: var(--text-dim); margin-top: 2px;">
                      {{ $perm->description ?? $perm->slug }}
                    </div>
                  </div>
                </label>
              @endforeach
            </div>
          </div>
        @endforeach
      </div>

      <!-- Form Actions -->
      <div style="display: flex; align-items: center; justify-content: flex-end; gap: 12px; margin-top: 30px; padding-top: 20px; border-top: 1px solid var(--border-color);">
        <a href="{{ admin_route('roles.index') }}" class="btn-saas btn-saas-secondary">
          Cancel
        </a>
        <button type="submit" class="btn-saas btn-saas-primary">
          <i class="fa-solid fa-check"></i>
          <span>Save Role</span>
        </button>
      </div>
    </div>
  </form>
</div>

<script>
  function toggleModuleGroup(groupClass) {
    const boxes = document.querySelectorAll('.' + groupClass + ' input[type="checkbox"]');
    const anyUnchecked = Array.from(boxes).some(b => !b.checked);
    boxes.forEach(b => b.checked = anyUnchecked);
  }

  function toggleAllPermissions(check) {
    const boxes = document.querySelectorAll('.perm-checkbox');
    const anyUnchecked = Array.from(boxes).some(b => !b.checked);
    boxes.forEach(b => b.checked = anyUnchecked);
  }
</script>
@endsection
