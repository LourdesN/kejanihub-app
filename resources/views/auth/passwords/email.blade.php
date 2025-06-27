<x-laravel-ui-adminlte::adminlte-layout>
    <head>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
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
                width: 400px;
            }

            .login-logo a, b {
                color: #FC466B;
                font-size: 2rem;
                font-weight: 600;
                text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.4);
            }

            .login-box-msg {
                font-weight: 500;
                color: #333;
            }

            .btn-primary {
                background-color: #6c63ff;
                border: none;
                font-weight: 500;
            }

            .btn-primary:hover {
                background-color: #574fd6;
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

            .input-group-text {
                background-color: transparent;
                border: none;
            }

            .alert-success {
                background-color: rgba(40, 167, 69, 0.2);
                color: #155724;
                border: 1px solid #c3e6cb;
                border-radius: 6px;
                padding: 10px;
                font-size: 0.9rem;
                font-weight: 500;
            }

            .card-body a {
                color: #4b4b4b;
                font-weight: 500;
            }
        </style>
    </head>

    <body class="hold-transition login-page">
        <div class="login-box">
            <div class="card">
                <div class="card-body login-card-body">
                    <div class="login-logo mb-4">
                        <a href="{{ url('/home') }}"><b>{{ config('app.name', 'Kejahub') }}</b></a>
                    </div>

                    <p class="login-box-msg">You forgot your password? Easily reset it below.</p>

                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form action="{{ route('password.email') }}" method="post">
                        @csrf

                        <div class="input-group mb-3">
                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                                   placeholder="Email" value="{{ old('email') }}" required autofocus>
                            <div class="input-group-append">
                                <div class="input-group-text"><span class="fas fa-envelope"></span></div>
                            </div>
                            @error('email')
                                <span class="error invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary btn-block">Send Password Reset Link</button>
                            </div>
                        </div>
                    </form>

                    <p class="mt-3 mb-1">
                        <a href="{{ route('login') }}">Login</a>
                    </p>
                    <p class="mb-0">
                        <a href="{{ route('register') }}" class="text-center">Register a new membership</a>
                    </p>
                </div>
            </div>
        </div>
    </body>
</x-laravel-ui-adminlte::adminlte-layout>
