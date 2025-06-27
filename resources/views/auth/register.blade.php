<x-laravel-ui-adminlte::adminlte-layout>
    <head>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
        <style>
            body {
                background: radial-gradient(circle, rgba(238, 174, 202, 1) 0%, rgba(148, 187, 233, 1) 100%);
                font-family: 'Poppins', sans-serif;
            }

            .register-box {
                display: flex;
                align-items: center;
                justify-content: center;
                min-height: 100vh;
                width: 400px;
            }

            .card {
                background: rgba(255, 255, 255, 0.2);
                backdrop-filter: blur(15px);
                border-radius: 1rem;
                box-shadow: 0 8px 32px rgba(0, 0, 0, 0.2);
                border: 1px solid rgba(255, 255, 255, 0.3);
                color: #333;
                width: 600px;
            }

            .register-logo a, b {
                color: #FC466B;
                font-size: 2rem;
                font-weight: 600;
            }

            .register-card-body {
                padding: 2rem;
            }

            .login-box-msg {
                font-weight: 500;
                color: #333;
            }

            .btn-primary {
                background-color: #6c63ff;
                border: none;
            }

            .btn-primary:hover {
                background-color: #574fd6;
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

            .invalid-feedback {
                display: block;
                font-size: 0.85rem;
                color: #dc3545;
            }

            .card-body a {
                color: #4b4b4b;
                font-weight: 500;
            }

            .icheck-primary label {
                font-weight: 400;
                font-size: 0.9rem;
            }

            .text-center {
                display: block;
                text-align: center;
                margin-top: 1rem;
            }
        </style>
    </head>

    <body class="hold-transition register-page">
        <div class="register-box">
            <div class="card">
                <div class="card-body register-card-body">
                    <div class="register-logo mb-4">
                        <a href="{{ url('/home') }}"><b>{{ config('app.name', 'Kejanihub') }}</b></a>
                    </div>

                    <p class="login-box-msg">Register a new membership</p>

                    <form method="post" action="{{ route('register') }}">
                        @csrf

                        <div class="input-group mb-3">
                            <input type="text" name="name"
                                class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}"
                                placeholder="Full name">
                            <div class="input-group-append">
                                <div class="input-group-text"><span class="fas fa-user"></span></div>
                            </div>
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="input-group mb-3">
                            <input type="email" name="email" value="{{ old('email') }}"
                                class="form-control @error('email') is-invalid @enderror" placeholder="Email">
                            <div class="input-group-append">
                                <div class="input-group-text"><span class="fas fa-envelope"></span></div>
                            </div>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                       <div class="input-group mb-3">
    <input type="password" id="password" name="password"
        class="form-control @error('password') is-invalid @enderror" placeholder="Password">
    <div class="input-group-append">
        <div class="input-group-text">
            <span class="fas fa-eye toggle-password" toggle="#password" style="cursor: pointer;"></span>
        </div>
        <div class="input-group-text">
            <span class="fas fa-lock"></span>
        </div>
    </div>
    @error('password')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>

<div class="input-group mb-3">
    <input type="password" id="password_confirmation" name="password_confirmation" class="form-control"
        placeholder="Retype password">
    <div class="input-group-append">
         <div class="input-group-text">
            <span class="fas fa-eye toggle-password" toggle="#password_confirmation" style="cursor: pointer;"></span>
        </div>
        <div class="input-group-text">
            <span class="fas fa-lock"></span>
        </div>
       
    </div>
</div>


                        <div class="row mb-3">
                            <div class="col-8">
                                <div class="icheck-primary">
                                    <input type="checkbox" id="agreeTerms" name="terms" value="agree">
                                    <label for="agreeTerms">
                                        I agree to the <a href="#">terms</a>
                                    </label>
                                </div>
                            </div>
                            <div class="col-4">
                                <button type="submit" class="btn btn-primary btn-block">Register</button>
                            </div>
                        </div>
                    </form>

                    <a href="{{ route('login') }}" class="text-center">I already have an account</a>
                </div>
            </div>
        </div>
    </body>
    <script>
    document.addEventListener("DOMContentLoaded", function () {
        document.querySelectorAll('.toggle-password').forEach(function (eyeIcon) {
            eyeIcon.addEventListener('click', function () {
                const input = document.querySelector(this.getAttribute('toggle'));
                const type = input.getAttribute('type') === 'password' ? 'text' : 'password';
                input.setAttribute('type', type);
                this.classList.toggle('fa-eye');
                this.classList.toggle('fa-eye-slash');
            });
        });
    });
</script>

</x-laravel-ui-adminlte::adminlte-layout>
