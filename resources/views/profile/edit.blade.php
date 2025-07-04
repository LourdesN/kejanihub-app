@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        
            <h3 class="mb-4 text-center text-pink font-weight-bold">
                My Profile
            </h3>

            @if(session('success-alert'))
                <script>
                    Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: "{{ session('success-alert') }}",
                        timer: 3000,
                        showConfirmButton: false
                    });
                </script>
            @endif

            @if ($errors->any())
                <div class="alert alert-danger shadow-sm">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li><i class="fas fa-exclamation-circle"></i> {{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="card shadow-lg border-0 rounded-lg">
                
                <div class="card-body px-4 py-5 bg-light">
                    <h5 class="mb-3 text-secondary font-weight-bold">
                        Profile Information 
                    </h5>


                    <form method="POST" action="{{ route('profile.update') }}">
                        @csrf

                        <div class="form-group">
                            <label class="font-weight-bold">Name</label>
                            <input type="text" class="form-control" value="{{ $user->name }}" disabled>
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold">Email</label>
                            <input type="email" class="form-control" value="{{ $user->email }}" disabled>
                        </div>

                        <hr class="my-4">

                        <h5 class="mb-3 text-secondary font-weight-bold">
                            Change Password
                        </h5>

                      <div class="form-group position-relative">
    <label>New Password</label>
    <input type="password" name="password" id="password" class="form-control" placeholder="Enter new password">
    <span toggle="#password" class="fa fa-fw fa-eye field-icon toggle-password" style="position: absolute; top: 38px; right: 15px; cursor: pointer;"></span>
</div>

<div class="form-group position-relative">
    <label>Confirm New Password</label>
    <input type="password" name="password_confirmation" id="confirm_password" class="form-control" placeholder="Confirm password">
    <span toggle="#confirm_password" class="fa fa-fw fa-eye field-icon toggle-password" style="position: absolute; top: 38px; right: 15px; cursor: pointer;"></span>
</div>

                        <div class="text-right mt-4">
                            <button type="submit" class="btn btn-primary px-4">
                                <i class="fas fa-save mr-1"></i> Update Profile
                            </button>
                        </div>
                        <div class=" text-left">
                            <a href="{{ url('/home') }}" class="btn btn-m btn-dark">
                            <i class="fas fa-arrow-left"></i> Back to Dashboard
                            </a>
                        </div>

                    </form>

                </div>
            </div>

        </div>
    </div>
</div>

<script>
    document.querySelectorAll('.toggle-password').forEach(item => {
        item.addEventListener('click', function () {
            const input = document.querySelector(this.getAttribute('toggle'));
            const type = input.getAttribute('type') === 'password' ? 'text' : 'password';
            input.setAttribute('type', type);

            this.classList.toggle('fa-eye');
            this.classList.toggle('fa-eye-slash');
        });
    });
</script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@if(session('success-alert'))
<script>
    Swal.fire({
        icon: 'success',
        title: 'Success',
        text: "{{ session('success-alert') }}",
        timer: 3000,
        showConfirmButton: false
    });
</script>
@endif

@endsection
