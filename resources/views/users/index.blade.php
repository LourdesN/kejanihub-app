@extends('layouts.app')

@section('content')
<!-- Font Awesome (icons) -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.4.0/css/all.min.css">

<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="text-primary fw-bold">Users in the System</h3>
        <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addUserModal">
            <i class="fas fa-user-plus me-1"></i> Add New User
        </button>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="card shadow-sm">
        <div class="card-body p-0">
            <table class="table table-bordered mb-0 table-hover align-middle">
                <thead class="table-dark text-center">
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th style="width: 200px;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr>
                        <td class="text-center">{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td class="text-center">
                            <button class="btn btn-sm btn-warning me-1" data-bs-toggle="modal" data-bs-target="#changePasswordModal{{ $user->id }}">
                                <i class="fas fa-key"></i> Change Password
                            </button>
                            <form action="{{ route('users.destroy', $user->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this user?');">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>

                    <!-- Change Password Modal -->
                    <div class="modal fade" id="changePasswordModal{{ $user->id }}" tabindex="-1">
                        <div class="modal-dialog modal-dialog-centered modal-md">
                            <form method="POST" action="{{ route('users.change-password', $user->id) }}">
                                @csrf
                                @method('PUT')
                                <div class="modal-content shadow-lg border-0 rounded-3">
                                    <div class="modal-header bg-warning text-white rounded-top">
                                        <h5 class="modal-title">Change Password - {{ $user->name }}</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                    </div>
                                    <div class="modal-body bg-light">
                                        <div class="mb-3">
                                            <label class="form-label">New Password</label>
                                            <div class="input-group">
                                                <input type="password" name="password" id="password-field-{{ $user->id }}" class="form-control" required>
                                                <span class="input-group-text bg-white" onclick="togglePassword('password-field-{{ $user->id }}', 'toggle-icon-{{ $user->id }}')" style="cursor:pointer;">
                                                    <i class="fas fa-eye" id="toggle-icon-{{ $user->id }}"></i>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Confirm Password</label>
                                            <div class="input-group">
                                                <input type="password" name="password_confirmation" id="confirm-password-field-{{ $user->id }}" class="form-control" required>
                                                <span class="input-group-text bg-white" onclick="togglePassword('confirm-password-field-{{ $user->id }}', 'toggle-confirm-icon-{{ $user->id }}')" style="cursor:pointer;">
                                                    <i class="fas fa-eye" id="toggle-confirm-icon-{{ $user->id }}"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer bg-light">
                                        <button type="submit" class="btn btn-primary">Update Password</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Add User Modal -->
<div class="modal fade" id="addUserModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-lg"> <!-- Made wider -->
        <form method="POST" action="{{ route('users.store') }}">
            @csrf
            <div class="modal-content shadow-lg border-0 rounded-3">
                <div class="modal-header bg-success text-white">
                    <h5 class="modal-title">Add New User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body bg-light">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label">Name</label>
                            <input type="text" name="name" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Password</label>
                            <div class="input-group">
                                <input type="password" name="password" id="password-field-add" class="form-control" required>
                                <span class="input-group-text bg-white" style="cursor:pointer"
                                      onclick="togglePassword('password-field-add', 'toggle-icon-add')">
                                    <i class="fas fa-eye" id="toggle-icon-add"></i>
                                </span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Confirm Password</label>
                            <div class="input-group">
                                <input type="password" name="password_confirmation" id="confirm-password-field-add" class="form-control" required>
                                <span class="input-group-text bg-white" style="cursor:pointer"
                                      onclick="togglePassword('confirm-password-field-add', 'toggle-confirm-icon-add')">
                                    <i class="fas fa-eye" id="toggle-confirm-icon-add"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer bg-light">
                    <button type="submit" class="btn btn-success">Create User</button>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection

@yield('scripts')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>

<script>
    function togglePassword(inputId, iconId) {
        const input = document.getElementById(inputId);
        const icon = document.getElementById(iconId);
        const isPassword = input.type === 'password';

        input.type = isPassword ? 'text' : 'password';
        icon.classList.toggle('fa-eye', !isPassword);
        icon.classList.toggle('fa-eye-slash', isPassword);
    }
</script>

