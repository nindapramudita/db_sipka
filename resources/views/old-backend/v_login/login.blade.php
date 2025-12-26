<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
php
    <title>SIPKA - Login</title>

    <link rel="icon" type="image/png" href="{{ asset('image/icon.png') }}">

    <!-- Soft UI CSS -->
    <link href="{{ asset('softui/assets/css/soft-ui-dashboard.css?v=1.0.7') }}" rel="stylesheet" />

    <style>
        body {
            background: linear-gradient(135deg, #ffd8e1, #d9e8ff);
        }

        .login-card {
            border-radius: 25px;
        }

        .logo-img {
            width: 120px;
            margin-bottom: 15px;
        }
    </style>
</head>

<body>

    <div class="container mt-6">

        <div class="row justify-content-center">

            <div class="col-md-5">
                <div class="card login-card shadow-lg p-4">

                    <div class="text-center mb-3">
                        <img src="{{ asset('image/icon.png') }}" class="logo-img" alt="logo">
                        <h4 class="font-weight-bolder">Login SIPKA</h4>
                        <p class="mb-0 text-secondary">Sistem Informasi Pelaporan Kekerasan Anak</p>
                    </div>

                    <!-- Error -->
                    @if(session()->has('error'))
                        <div class="alert alert-danger text-center py-2">
                            {{ session('error') }}
                        </div>
                    @endif

                    <form action="{{ route('backend.login.process') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="text"
                                   name="email"
                                   class="form-control @error('email') is-invalid @enderror"
                                   placeholder="Masukkan Email"
                                   value="{{ old('email') }}">
                            @error('email')
                                <span class="text-danger small">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <input type="password"
                                   name="password"
                                   class="form-control @error('password') is-invalid @enderror"
                                   placeholder="Masukkan Password">
                            @error('password')
                                <span class="text-danger small">{{ $message }}</span>
                            @enderror
                        </div>

                        <button class="btn bg-gradient-primary w-100 mt-3">
                            Login
                        </button>

                    </form>

                </div>
            </div>

        </div>
    </div>

    <!-- Soft UI JS -->
    <script src="{{ asset('softui/assets/js/core/popper.min.js') }}"></script>
    <script src="{{ asset('softui/assets/js/core/bootstrap.min.js') }}"></script>

</body>
</html>
