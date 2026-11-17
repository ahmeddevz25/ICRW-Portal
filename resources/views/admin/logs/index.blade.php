@extends('admin.layouts')
@section('title', 'Audit Trail & Activity Logs')
@section('content')

    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <div class="layout-page">

                <div class="card mt-4 shadow-sm rounded" style="margin: 24px;">
                    <!-- Header -->
                    <div class="card-header d-flex justify-content-between align-items-center bg-light border-bottom">
                        <div>
                            <h5 class="card-title mb-0 fw-bold text-dark">Audit Trail & Activity Logs</h5>
                            <small class="text-muted">Security ledger tracking administrative mutations and access logs.</small>
                        </div>
                        @can_perm('logs.clear')
                            <form action="{{ route('logs.clear') }}" method="POST" onsubmit="return confirm('Prune activity records older than 30 days?');" class="m-0">
                                @csrf
                                <input type="hidden" name="days" value="30">
                                <button type="submit" class="btn btn-sm btn-outline-danger d-flex align-items-center gap-1">
                                    <i class="bx bx-trash"></i>
                                    <span>Prune Logs (> 30 Days)</span>
                                </button>
                            </form>
                        @endcan_perm
                    </div>

                    <!-- Filter Bar -->
                    <div class="p-3 bg-white border-bottom">
                        <form action="{{ route('logs.index') }}" method="GET" class="row g-2 align-items-center">
                            <div class="col-12 col-md-3">
                                <input type="text" name="search" class="form-control form-control-sm" placeholder="Search description, IP..." value="{{ request('search') }}">
                            </div>
                            <div class="col-6 col-md-2">
                                <select name="module" class="form-select form-select-sm">
                                    <option value="">All Modules</option>
                                    @foreach($modules as $m)
                                        <option value="{{ $m }}" {{ request('module') === $m ? 'selected' : '' }}>{{ ucfirst($m) }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-6 col-md-2">
                                <select name="action" class="form-select form-select-sm">
                                    <option value="">All Actions</option>
                                    @foreach($actions as $a)
                                        <option value="{{ $a }}" {{ request('action') === $a ? 'selected' : '' }}>{{ $a }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-6 col-md-2">
                                <select name="user_id" class="form-select form-select-sm">
                                    <option value="">All Operators</option>
                                    @foreach($users as $u)
                                        <option value="{{ $u->id }}" {{ request('user_id') == $u->id ? 'selected' : '' }}>{{ $u->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-6 col-md-2">
                                <input type="date" name="date" class="form-control form-control-sm" value="{{ request('date') }}">
                            </div>
                            <div class="col-12 col-md-1 d-flex gap-1">
                                <button type="submit" class="btn btn-sm btn-primary w-100"><i class="bx bx-filter"></i></button>
                                @if(request()->hasAny(['search', 'module', 'action', 'user_id', 'date']))
                                    <a href="{{ route('logs.index') }}" class="btn btn-sm btn-outline-secondary" title="Reset"><i class="bx bx-reset"></i></a>
                                @endif
                            </div>
                        </form>
                    </div>

                    <!-- Table -->
                    <div class="table-responsive p-3">
                        <table class="table table-hover align-middle table-striped border-top w-100 mb-0">
                            <thead class="table-light">
                                <tr class="text-muted text-uppercase small">
                                    <th style="width: 170px;">Timestamp</th>
                                    <th>Operator</th>
                                    <th>Module</th>
                                    <th>Action</th>
                                    <th>Description</th>
                                    <th>IP Address</th>
                                    <th class="text-center" style="width: 90px;">Inspect</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($logs as $log)
                                    <tr>
                                        <td>
                                            <div class="fw-bold text-dark small">{{ $log->created_at->format('M d, Y') }}</div>
                                            <small class="text-muted">{{ $log->created_at->format('h:i:s A') }}</small>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center gap-2">
                                                <div class="avatar bg-label-primary rounded-circle d-flex align-items-center justify-content-center" style="width: 30px; height: 30px; font-weight: 700; font-size: 11px;">
                                                    {{ strtoupper(substr($log->user->name ?? 'S', 0, 1)) }}
                                                </div>
                                                <div>
                                                    <span class="fw-bold text-dark small d-block">{{ $log->user->name ?? 'System' }}</span>
                                                    <small class="text-muted" style="font-size: 11px;">{{ $log->user->email ?? 'Automated' }}</small>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <span class="badge bg-label-info text-capitalize">{{ $log->module }}</span>
                                        </td>
                                        <td>
                                            @php
                                                $badgeClass = match(strtoupper($log->action)) {
                                                    'CREATE'      => 'bg-label-success',
                                                    'UPDATE'      => 'bg-label-primary',
                                                    'DELETE'      => 'bg-label-danger',
                                                    'LOGIN'       => 'bg-label-info',
                                                    'LOGIN_FAILED'=> 'bg-label-danger',
                                                    'CACHE_CLEAR' => 'bg-label-warning',
                                                    default       => 'bg-label-secondary',
                                                };
                                            @endphp
                                            <span class="badge {{ $badgeClass }}">{{ $log->action }}</span>
                                        </td>
                                        <td class="small text-dark" style="max-width: 300px;">
                                            {{ $log->description }}
                                        </td>
                                        <td>
                                            <code class="small text-muted">{{ $log->ip_address ?? '127.0.0.1' }}</code>
                                        </td>
                                        <td class="text-center">
                                            <button type="button" class="btn btn-sm btn-icon btn-outline-primary" onclick="inspectLog({{ $log->id }})" title="Inspect JSON Payload">
                                                <i class="bx bx-code-alt"></i>
                                            </button>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7" class="text-center py-4 text-muted">
                                            <i class="bx bx-history fs-2 d-block mb-1"></i>
                                            No audit trail records found.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    @if($logs->hasPages())
                        <div class="card-footer bg-white border-top d-flex justify-content-between align-items-center py-2 px-3">
                            <small class="text-muted">Showing {{ $logs->firstItem() }} to {{ $logs->lastItem() }} of {{ $logs->total() }} records</small>
                            <div>{{ $logs->links() }}</div>
                        </div>
                    @endif

                </div> <!-- card -->
            </div> <!-- layout-page -->
        </div> <!-- layout-container -->
    </div> <!-- wrapper -->

    <!-- Log Inspector Modal -->
    <div class="modal fade" id="logInspectModal" tabindex="-1" aria-labelledby="logInspectModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header border-bottom py-3">
                    <h5 class="modal-title fw-bold" id="logInspectModalLabel">
                        <i class="bx bx-code-alt text-primary me-1"></i> Audit Payload Inspector
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body p-4">
                    <div class="mb-3">
                        <small class="text-muted fw-bold text-uppercase d-block mb-1">Event Description</small>
                        <div id="modalLogDesc" class="p-2 rounded bg-light border text-dark fw-semibold small"></div>
                    </div>

                    <div class="row g-3">
                        <div class="col-md-6">
                            <small class="text-danger fw-bold text-uppercase d-block mb-1">Prior State (Old Values)</small>
                            <pre id="modalOldValues" class="p-3 rounded bg-dark text-light small mb-0" style="max-height: 240px; overflow-y: auto; font-family: monospace;"></pre>
                        </div>
                        <div class="col-md-6">
                            <small class="text-success fw-bold text-uppercase d-block mb-1">Mutated State (New Values)</small>
                            <pre id="modalNewValues" class="p-3 rounded bg-dark text-light small mb-0" style="max-height: 240px; overflow-y: auto; font-family: monospace;"></pre>
                        </div>
                    </div>
                </div>
                <div class="modal-footer border-top py-2">
                    <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <div class="layout-overlay layout-menu-toggle"></div>

@push('scripts')
<script>
    function inspectLog(id) {
        const modal = new bootstrap.Modal(document.getElementById('logInspectModal'));
        const descEl = document.getElementById('modalLogDesc');
        const oldEl = document.getElementById('modalOldValues');
        const newEl = document.getElementById('modalNewValues');

        descEl.textContent = 'Loading...';
        oldEl.textContent = '...';
        newEl.textContent = '...';
        modal.show();

        const urlTemplate = "{{ route('logs.show', ['log' => ':id']) }}";
        fetch(urlTemplate.replace(':id', id), {
            headers: { 'Accept': 'application/json' }
        })
        .then(r => r.json())
        .then(data => {
            descEl.textContent = data.description || 'No description';
            oldEl.textContent = data.old_values ? JSON.stringify(data.old_values, null, 2) : 'None';
            newEl.textContent = data.new_values ? JSON.stringify(data.new_values, null, 2) : 'None';
        })
        .catch(() => {
            descEl.textContent = 'Error loading log details.';
        });
    }
</script>
@endpush
@endsection
