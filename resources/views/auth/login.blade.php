<x-laravel-ui-adminlte::adminlte-layout>
    <head>
        <style>
            body {
                background: radial-gradient(circle, rgba(238, 174, 202, 1) 0%, rgba(148, 187, 233, 1) 100%);
                font-family: 'Poppins', sans-serif;
            }

            .login-box {
                display: flex;
                align-items: center;
                justify-content: center;
                min-height: 100vh;
            }

            .card {
                background: rgba(255, 255, 255, 0.2);
                backdrop-filter: blur(15px);
                border-radius: 1rem;
                box-shadow: 0 8px 32px rgba(0, 0, 0, 0.2);
                border: 1px solid rgba(255, 255, 255, 0.3);
                color: #333;
                width: 400px;
            }

            .login-logo a, b {
                color: #FC466B;
                font-size: 2rem;
                font-weight: 600;
            }

            .btn-primary {
                background-color: #6c63ff;
                border: none;
            }

            .btn-primary:hover {
                background-color: #574fd6;
            }

            .login-box-msg {
                font-weight: 500;
                color: #333;
            }

            .card-body a {
                color: #4b4b4b;
                font-weight: 500;
            }

            .input-group-text {
                background-color: transparent;
                border: none;
            }

            .form-control {
                background-color: rgba(255, 255, 255, 0.6);
                border: none;
                border-radius: 8px;
            }

            .form-control:focus {
                box-shadow: none;
                border: 1px solid #999;
            }
        </style>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    </head>

    <body class="hold-transition login-page">
        <div class="login-box">
            <div>
                <div class="card">
                    <div class="card-body login-card-body">
                        <div class="login-logo mb-4">
                           <a href="{{ url('/home') }}"><b>{{ config('app.name', 'Kejanihub') }}</b></a>
                         </div>
                        <p class="login-box-msg">Sign in to start your session</p>

                        <form method="post" action="{{ url('/login') }}">
                            @csrf

                            <div class="input-group mb-3">
                                <input type="email" name="email" value="{{ old('email') }}" placeholder="Email"
                                    class="form-control @error('email') is-invalid @enderror">
                                <div class="input-group-append">
                                    <div class="input-group-text"><span class="fas fa-envelope"></span></div>
                                </div>
                                @error('email')
                                    <span class="error invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                        <div class="input-group mb-3">
    <input type="password" name="password" id="password-field" placeholder="Password"
        class="form-control @error('password') is-invalid @enderror">
    <div class="input-group-append">
     <div class="input-group-text" style="cursor:pointer" onclick="togglePassword()">
            <span class="fas fa-eye" id="toggle-password-icon"></span>
        </div>
           <div class="input-group-text">
            <span class="fas fa-lock"></span>
        </div>
    </div>
    @error('password')
        <span class="error invalid-feedback d-block">{{ $message }}</span>
    @enderror
</div>


                            <div class="row mb-3">
                                <div class="col-8">
                                    <div class="icheck-primary">
                                        <input type="checkbox" id="remember" name="remember">
                                        <label for="remember">Remember Me</label>
                                    </div>
                                </div>

                                <div class="col-4">
                                    <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                                </div>
                            </div>
                        </form>

                        <p class="mb-1">
                            <a href="{{ route('password.request') }}">I forgot my password</a>
                        </p>
                        <p class="mb-0">
                            <a href="{{ route('register') }}" class="text-center">Register a new account</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </body>
    <script>
    function togglePassword() {
        const passwordInput = document.getElementById('password-field');
        const toggleIcon = document.getElementById('toggle-password-icon');
        const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';

        passwordInput.setAttribute('type', type);
        toggleIcon.classList.toggle('fa-eye');
        toggleIcon.classList.toggle('fa-eye-slash');
    }
</script>

</x-laravel-ui-adminlte::adminlte-layout>
