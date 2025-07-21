@extends('layouts.app')

@section('content')
<!-- Font Awesome (No integrity to avoid blocking issues) -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.4.0/css/all.min.css">

<div class="container">
    <h3 class="mb-4 text-primary">Users in the System</h3>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="mb-3">
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addUserModal">Add New User</button>
    </div>

    <table class="table table-striped table-bordered">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>
                    <button class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#changePasswordModal{{ $user->id }}">
                        Change Password
                    </button>
                    <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Delete this user?');">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger">Delete</button>
                    </form>
                </td>
            </tr>

            <!-- Password Change Modal -->
            <div class="modal fade" id="changePasswordModal{{ $user->id }}" tabindex="-1">
              <div class="modal-dialog">
                <form method="POST" action="{{ route('users.change-password', $user->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="modal-content">
                      <div class="modal-header bg-warning">
                        <h5 class="modal-title">Change Password - {{ $user->name }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                      </div>
                      <div class="modal-body">
                          <div class="mb-3">
                              <label>New Password</label>
                              <div class="input-group">
                                  <input type="password" name="password" id="password-field-{{ $user->id }}" class="form-control">
                                  <div class="input-group-text" style="cursor:pointer" onclick="togglePassword('password-field-{{ $user->id }}', 'toggle-icon-{{ $user->id }}')">
                                      <i class="fas fa-eye" id="toggle-icon-{{ $user->id }}"></i>
                                  </div>
                              </div>
                          </div>
                          <div class="mb-3">
                              <label>Confirm Password</label>
                              <div class="input-group">
                                  <input type="password" name="password_confirmation" id="confirm-password-field-{{ $user->id }}" class="form-control">
                                  <div class="input-group-text" style="cursor:pointer" onclick="togglePassword('confirm-password-field-{{ $user->id }}', 'toggle-confirm-icon-{{ $user->id }}')">
                                      <i class="fas fa-eye" id="toggle-confirm-icon-{{ $user->id }}"></i>
                                  </div>
                              </div>
                          </div>
                      </div>
                      <div class="modal-footer">
                          <button type="submit" class="btn btn-primary">Update</button>
                      </div>
                    </div>
                </form>
              </div>
            </div>
        @endforeach
        </tbody>
    </table>
</div>

<!-- Add User Modal -->
<div class="modal fade" id="addUserModal" tabindex="-1">
  <div class="modal-dialog">
    <form method="POST" action="{{ route('users.store') }}">
        @csrf
        <div class="modal-content">
          <div class="modal-header bg-primary text-white">
            <h5 class="modal-title">Add New User</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
          </div>
          <div class="modal-body">
              <div class="mb-3">
                  <label>Name</label>
                  <input type="text" name="name" class="form-control" required>
              </div>
              <div class="mb-3">
                  <label>Email</label>
                  <input type="email" name="email" class="form-control" required>
              </div>
              <div class="mb-3">
                  <label>Password</label>
                  <div class="input-group">
                      <input type="password" name="password" id="password-field-add" class="form-control" required>
                      <div class="input-group-text" style="cursor:pointer" onclick="togglePassword('password-field-add', 'toggle-icon-add')">
                          <i class="fas fa-eye" id="toggle-icon-add"></i>
                      </div>
                  </div>
              </div>
              <div class="mb-3">
                  <label>Confirm Password</label>
                  <div class="input-group">
                      <input type="password" name="password_confirmation" id="confirm-password-field-add" class="form-control" required>
                      <div class="input-group-text" style="cursor:pointer" onclick="togglePassword('confirm-password-field-add', 'toggle-confirm-icon-add')">
                          <i class="fas fa-eye" id="toggle-confirm-icon-add"></i>
                      </div>
                  </div>
              </div>
          </div>
          <div class="modal-footer">
              <button type="submit" class="btn btn-primary">Create User</button>
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

