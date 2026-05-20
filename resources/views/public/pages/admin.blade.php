{{-- ══════════════════════════════════════════════════════════
     FILE: resources/views/auth/login.blade.php
     CREATE this new file (new folder: resources/views/auth/)
══════════════════════════════════════════════════════════ --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Admin Login | Hotel Channel Manager</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="{{ asset('images/favicon.png') }}">
    @include('public.libraries.style')
    <style>
        body { background: #1e2139; }
        .login-wrapper {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .login-card {
            background: #252849;
            border-radius: 16px;
            padding: 40px;
            width: 100%;
            max-width: 440px;
            box-shadow: 0 20px 60px rgba(0,0,0,0.4);
        }
        .login-logo {
            text-align: center;
            margin-bottom: 30px;
        }
        .login-logo img { height: 50px; }
        .login-logo h4 {
            color: #fff;
            margin-top: 12px;
            font-weight: 700;
            font-size: 20px;
        }
        .login-logo p {
            color: #9da0b3;
            font-size: 13px;
            margin: 0;
        }
        .form-label { color: #9da0b3; font-size: 13px; font-weight: 500; }
        .form-control {
            background: #1e2139 !important;
            border: 1px solid #3a3f5c !important;
            color: #fff !important;
            border-radius: 8px;
            padding: 12px 16px;
        }
        .form-control:focus {
            border-color: var(--primary) !important;
            box-shadow: 0 0 0 3px rgba(99,102,241,0.15) !important;
        }
        .form-control::placeholder { color: #5a5e7a; }
        .btn-login {
            background: var(--primary);
            border: none;
            border-radius: 8px;
            color: #fff;
            font-weight: 600;
            padding: 13px;
            width: 100%;
            font-size: 15px;
            transition: all 0.2s;
        }
        .btn-login:hover { opacity: 0.9; transform: translateY(-1px); }
        .divider { color: #5a5e7a; text-align: center; font-size: 12px; margin: 20px 0; }
        .alert-danger {
            background: rgba(239,68,68,0.12);
            border: 1px solid rgba(239,68,68,0.3);
            color: #fca5a5;
            border-radius: 8px;
            font-size: 13px;
        }
        .input-group-text {
            background: #1e2139 !important;
            border: 1px solid #3a3f5c !important;
            border-left: none !important;
            color: #9da0b3 !important;
            cursor: pointer;
        }
        .hotel-badge {
            background: rgba(99,102,241,0.12);
            border-radius: 50px;
            padding: 6px 16px;
            font-size: 12px;
            color: var(--primary);
            font-weight: 600;
            display: inline-block;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>

<div class="login-wrapper">
    <div class="login-card">

        {{-- Logo / Brand --}}
        <div class="login-logo">
            <div class="hotel-badge">🏨 HOTEL CHANNEL MANAGER</div>
            <h4>Admin Portal</h4>
            <p>Sign in to manage your properties & channels</p>
        </div>

        {{-- Error Messages --}}
        @if ($errors->any())
            <div class="alert alert-danger mb-3">
                <i class="fa fa-exclamation-circle me-2"></i>
                {{ $errors->first() }}
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger mb-3">
                <i class="fa fa-exclamation-circle me-2"></i>
                {{ session('error') }}
            </div>
        @endif

        {{-- Login Form --}}
        <form method="POST" action="{{ route('login.submit') }}">
            @csrf

            {{-- Email --}}
            <div class="mb-3">
                <label class="form-label">Email Address</label>
                <input
                    type="email"
                    name="email"
                    class="form-control @error('email') is-invalid @enderror"
                    placeholder="admin@hotel.com"
                    value="{{ old('email') }}"
                    required
                    autofocus
                >
            </div>

            {{-- Password --}}
            <div class="mb-4">
                <label class="form-label">Password</label>
                <div class="input-group">
                    <input
                        type="password"
                        name="password"
                        id="passwordInput"
                        class="form-control @error('password') is-invalid @enderror"
                        placeholder="Enter your password"
                        required
                    >
                    <span class="input-group-text" onclick="togglePassword()">
                        <i class="fa fa-eye" id="eyeIcon"></i>
                    </span>
                </div>
            </div>

            {{-- Remember Me --}}
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember">
                    <label class="form-check-label text-muted" for="remember" style="font-size:13px;">
                        Remember me
                    </label>
                </div>
            </div>

            {{-- Submit --}}
            <button type="submit" class="btn-login">
                <i class="fa fa-sign-in-alt me-2"></i> Sign In
            </button>
        </form>

        <div class="divider mt-4" style="color:#5a5e7a; font-size:12px; text-align:center;">
            Hotel Channel Manager &copy; {{ date('Y') }}
        </div>

    </div>
</div>

@include('public.libraries.script')
<script>
function togglePassword() {
    const input = document.getElementById('passwordInput');
    const icon  = document.getElementById('eyeIcon');
    if (input.type === 'password') {
        input.type = 'text';
        icon.classList.replace('fa-eye', 'fa-eye-slash');
    } else {
        input.type = 'password';
        icon.classList.replace('fa-eye-slash', 'fa-eye');
    }
}
</script>
</body>
</html>
