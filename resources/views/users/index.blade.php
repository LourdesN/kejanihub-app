@extends('layouts.app')

@section('content')
<div class="container">
    <h3 class="mb-4 text-primary">Users in the System</h3>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif


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
                              <input type="password" name="password" class="form-control" required>
                          </div>
                          <div class="mb-3">
                              <label>Confirm Password</label>
                              <input type="password" name="password_confirmation" class="form-control" required>
                          </div>
                      </div>
                      <div class="modal-footer">
                          <button type="submit" class="btn btn-warning">Update</button>
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
                  <input type="password" name="password" class="form-control" required>
              </div>
              <div class="mb-3">
                  <label>Confirm Password</label>
                  <input type="password" name="password_confirmation" class="form-control" required>
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
@section('scripts')
<!-- Bootstrap 5.3.2 Bundle (JS + Popper) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" 
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" 
        crossorigin="anonymous"></script>

@endsection
