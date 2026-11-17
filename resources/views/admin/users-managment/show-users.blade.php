@extends('admin.layouts')
@section('title', 'Users Management')
@section('content')

    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <div class="layout-page">

                <div class="card mt-4 shadow-sm rounded" style="margin: 24px;">
                    <!-- Header -->
                    <div class="card-header d-flex justify-content-between align-items-center bg-light border-bottom">
                        <h5 class="card-title mb-0 text-md-start text-center fw-bold text-dark">Administrative Users</h5>
                        <div class="d-flex align-items-center gap-2">
                            <select id="roleFilter" class="form-select form-select-sm" style="width: 170px;">
                                <option value="">All Roles</option>
                                @foreach($roles as $r)
                                    <option value="{{ $r->name }}">{{ $r->name }}</option>
                                @endforeach
                            </select>
                            @can_perm('users.create')
                                <button id="addUserBtn" class="btn btn-primary d-flex align-items-center gap-2" data-bs-toggle="modal"
                                    data-bs-target="#userModal">
                                    <i class="bx bx-plus icon-sm"></i>
                                    <span class="d-none d-sm-inline-block">Add User</span>
                                </button>
                            @endcan_perm
                        </div>
                    </div>

                    <!-- Table (Server-Side AJAX) -->
                    <div class="table-responsive p-3">
                        <table class="table table-hover align-middle table-striped border-top w-100 mb-0" id="usersTable">
                            <thead class="table-light">
                                <tr class="text-muted text-uppercase small">
                                    <th style="width: 50px;" class="text-center">Sr. No</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Roles</th>
                                    <th class="text-center">Status</th>
                                    <th class="text-center" style="width: 120px;">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- Dynamically populated via DataTables Server-Side AJAX --}}
                            </tbody>
                        </table>
                    </div>

                    <!-- Add/Edit User Modal -->
                    <div class="modal fade" id="userModal" tabindex="-1" aria-labelledby="userModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-dialog-centered">
                            <div class="modal-content">
                                <form id="userForm" method="POST">
                                    @csrf
                                    <div id="formMethod"></div>

                                    <div class="modal-header border-bottom py-3">
                                        <h5 class="modal-title fw-bold" id="userModalLabel">Add New User</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                    </div>

                                    <div class="modal-body p-4">
                                        <div class="row">
                                            {{-- Name --}}
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label fw-semibold">Full Name <span class="text-danger">*</span></label>
                                                <input type="text" name="name" id="user_name" class="form-control"
                                                    placeholder="e.g. Dr. Ayesha Khan" required>
                                            </div>

                                            {{-- Email --}}
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label fw-semibold">Email Address <span class="text-danger">*</span></label>
                                                <input type="email" name="email" id="user_email" class="form-control"
                                                    placeholder="admin@icrw.net" required>
                                            </div>

                                            {{-- Phone --}}
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label fw-semibold">Contact Phone</label>
                                                <input type="text" name="phone" id="user_phone" class="form-control"
                                                    placeholder="+92 300 1234567">
                                            </div>

                                            {{-- Role --}}
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label fw-semibold">Assign Role <span class="text-danger">*</span></label>
                                                <select name="role" id="user_role" class="form-select" required>
                                                    <option value="" disabled selected>-- Select Role --</option>
                                                    @foreach ($roles as $role)
                                                        <option value="{{ $role->name }}">{{ $role->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            {{-- Password --}}
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label fw-semibold">Password <span id="passReqStar" class="text-danger">*</span></label>
                                                <input type="password" name="password" id="user_password" class="form-control"
                                                    placeholder="••••••••">
                                                <small class="text-muted d-block mt-1" id="passHelpText">Minimum 8 characters</small>
                                            </div>

                                            {{-- Status --}}
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label fw-semibold">Account State</label>
                                                <div class="pt-2">
                                                    <div class="form-check form-switch">
                                                        <input class="form-check-input" type="checkbox" name="is_active" id="user_is_active" value="1" checked>
                                                        <label class="form-check-label fw-semibold" for="user_is_active">
                                                            Active Account (Allowed to sign in)
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="modal-footer border-top py-3">
                                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                                        <button type="submit" class="btn btn-primary" id="modalSubmitBtn">Add User</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div> <!-- card -->
            </div> <!-- layout-page -->
        </div> <!-- layout-container -->
    </div> <!-- wrapper -->

    <div class="layout-overlay layout-menu-toggle"></div>

@push('scripts')
    <script>
        $(document).ready(function() {
            // Users DataTable (Server-Side AJAX)
            const dataTable = $('#usersTable').DataTable({
                processing: true,
                serverSide: true,
                searchDelay: 300,
                ordering: false,
                autoWidth: false,
                pageLength: 10,
                ajax: {
                    url: window.location.href,
                    type: 'GET',
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest',
                        'Accept': 'application/json'
                    },
                    data: function(d) {
                        d.role_filter = $('#roleFilter').val();
                    },
                    error: function(xhr, error, code) {
                        console.error('Users DataTable Error:', error, xhr.responseText);
                    }
                },
                dom: 'lfrtip',
                columns: [
                    { data: 'index', name: 'index', orderable: false, searchable: false, className: 'text-center' },
                    { data: 'name', name: 'name' },
                    { data: 'email', name: 'email' },
                    { data: 'phone', name: 'phone' },
                    { data: 'roles', name: 'roles' },
                    { data: 'status', name: 'status', className: 'text-center' },
                    { data: 'actions', name: 'actions', orderable: false, searchable: false, className: 'text-center' }
                ],
                language: {
                    search: "_INPUT_",
                    searchPlaceholder: "Search users, email, phone...",
                    lengthMenu: "Show _MENU_ entries",
                    processing: '<div class="d-flex justify-content-center align-items-center py-2 text-primary"><div class="spinner-border spinner-border-sm me-2" role="status"></div> Loading users...</div>',
                    emptyTable: '<div class="text-center text-muted py-4"><i class="bx bx-user fs-2 d-block mb-1"></i> No users found</div>',
                    zeroRecords: '<div class="text-center text-muted py-4"><i class="bx bx-search-alt fs-2 d-block mb-1"></i> No matching users found</div>',
                    info: "Showing _START_ to _END_ of _TOTAL_ users",
                    infoEmpty: "Showing 0 to 0 of 0 users",
                    infoFiltered: "(filtered from _MAX_ total users)"
                }
            });

            $('#roleFilter').on('change', function() {
                dataTable.ajax.reload();
            });

            // Grab form elements
            let form = document.getElementById("userForm");
            let formMethod = document.getElementById("formMethod");
            let nameInput = document.getElementById("user_name");
            let emailInput = document.getElementById("user_email");
            let phoneInput = document.getElementById("user_phone");
            let roleSelect = document.getElementById("user_role");
            let passInput = document.getElementById("user_password");
            let passReqStar = document.getElementById("passReqStar");
            let passHelpText = document.getElementById("passHelpText");
            let activeCheck = document.getElementById("user_is_active");
            let modalTitle = document.getElementById("userModalLabel");
            let submitBtn = document.getElementById("modalSubmitBtn");

            // Add User Button
            document.getElementById("addUserBtn").addEventListener("click", function() {
                form.action = "{{ route('users.store') }}";
                formMethod.innerHTML = "";

                nameInput.value = "";
                emailInput.value = "";
                phoneInput.value = "";
                roleSelect.value = "";
                passInput.value = "";
                passInput.required = true;
                passReqStar.style.display = 'inline';
                passHelpText.textContent = "Minimum 8 characters";
                activeCheck.checked = true;

                modalTitle.textContent = "Add New User";
                submitBtn.textContent = "Add User";
            });

            // Edit User Button (Delegated for AJAX table)
            $(document).on("click", ".editUserBtn", function() {
                let id = this.dataset.id;
                let name = this.dataset.name;
                let email = this.dataset.email;
                let phone = this.dataset.phone || '';
                let role = this.dataset.role;
                let isActive = this.dataset.active == "1";

                form.action = "{{ route('users.index') }}/" + id;
                formMethod.innerHTML = `{!! method_field('PUT') !!}`;

                nameInput.value = name;
                emailInput.value = email;
                phoneInput.value = phone;
                roleSelect.value = role;
                passInput.value = "";
                passInput.required = false;
                passReqStar.style.display = 'none';
                passHelpText.textContent = "Leave blank to keep existing password";
                activeCheck.checked = isActive;

                modalTitle.textContent = "Edit User";
                submitBtn.textContent = "Update User";
            });

            // Delegated AJAX Delete User
            $(document).on('click', '.delete-user-ajax-btn', function(e) {
                e.preventDefault();
                const url = $(this).data('url');
                const name = $(this).data('name') || 'this user';

                Swal.fire({
                    title: 'Delete User?',
                    text: `Are you sure you want to delete "${name}"? You won't be able to revert this!`,
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#6c757d',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: url,
                            type: 'POST',
                            data: {
                                _token: $('meta[name="csrf-token"]').attr('content'),
                                _method: 'DELETE'
                            },
                            headers: {
                                'X-Requested-With': 'XMLHttpRequest',
                                'Accept': 'application/json'
                            },
                            success: function(res) {
                                Swal.fire('Deleted!', res.message || 'User has been deleted.', 'success');
                                dataTable.ajax.reload(null, false);
                            },
                            error: function(xhr) {
                                Swal.fire('Error!', xhr.responseJSON?.message || 'Failed to delete user.', 'error');
                            }
                        });
                    }
                });
            });
        });
    </script>
@endpush
@endsection
