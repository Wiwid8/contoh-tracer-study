<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Sistem Informasi Tracer Study UAD</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <style>
        :root {
            --primary-blue: #003366;
            --secondary-blue: #3b82f6;
            --light-blue: #dbeafe;
            --accent-yellow: #fab300;
            --light-yellow: #fef3c7;
        }

        body {
            background: linear-gradient(135deg, var(--primary-blue), var(--secondary-blue));
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        .login-container {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2rem 0;
        }

        .login-card {
            background: white;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
            overflow: hidden;
            width: 100%;
            max-width: 420px;
        }

        .login-header {
            background: var(--primary-blue);
            color: white;
            padding: 2rem;
            text-align: center;
        }

        .login-logo {
            display: block;
            width: 200px;
            margin: 2rem auto 1rem;
            background: white;
            padding: 10px;
            border-radius: 10px;
        }

        .login-body {
            padding: 2rem;
        }

        .form-control {
            border: 2px solid #e2e8f0;
            border-radius: 8px;
            padding: 0.75rem 1rem;
        }

        .form-control:focus {
            border-color: var(--primary-blue);
            box-shadow: 0 0 0 0.2rem rgba(0, 51, 102, 0.25);
        }

        .btn-login {
            background: var(--primary-blue);
            color: white;
            border-radius: 8px;
            padding: 0.75rem;
            font-weight: 600;
            width: 100%;
        }

        .btn-login:hover {
            background: var(--secondary-blue);
        }

        .divider {
            display: flex;
            align-items: center;
            text-align: center;
            margin: 1.5rem 0;
        }

        .divider::before,
        .divider::after {
            content: '';
            flex: 1;
            border-bottom: 1px solid #e2e8f0;
        }

        .divider span {
            padding: 0 1rem;
            color: #6b7280;
        }

        .login-links {
            text-align: center;
            margin-top: 1.5rem;
        }

        .login-links a {
            color: var(--primary-blue);
            text-decoration: none;
            font-weight: 500;
        }

        .footer {
            background: var(--primary-blue);
            color: white;
            text-align: center;
            padding: 1rem;
        }
    </style>
</head>
<body>

<img src="{{ asset('logo-tracer-study.png') }}" class="login-logo">

<div class="login-container">
    <div class="login-card" data-aos="zoom-in">

        <div class="login-header">
            <h4 class="mb-0">LOGIN</h4>
        </div>

        <div class="login-body">

            {{-- ERROR MESSAGE --}}
            @if ($errors->any())
                <div class="alert alert-danger">
                    {{ $errors->first() }}
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf

                {{-- EMAIL --}}
                <div class="mb-3">
                    <label class="form-label fw-semibold">Email</label>
                    <input
                        type="email"
                        name="email"
                        value="{{ old('email') }}"
                        class="form-control"
                        required
                        autofocus
                    >
                </div>

                {{-- PASSWORD --}}
                <div class="mb-3">
                    <label class="form-label fw-semibold">Password</label>
                    <input
                        type="password"
                        name="password"
                        class="form-control"
                        required
                    >
                </div>

                {{-- REMEMBER ME --}}
                <div class="mb-3 form-check">
                    <input
                        type="checkbox"
                        name="remember"
                        class="form-check-input"
                        id="remember"
                    >
                    <label class="form-check-label" for="remember">
                        Remember me
                    </label>
                </div>

                {{-- LOGIN BUTTON --}}
                <button type="submit" class="mb-3 btn btn-login">
                    Login
                </button>

                <div class="divider">
                    <span>Atau</span>
                </div>

                {{-- LINKS --}}
                <div class="login-links">
                    <div class="mb-2">
                        Belum punya akun?
                        <a href="{{ route('register') }}">Daftar di sini</a>
                    </div>
                    <div>
                        <a href="{{ route('password.request') }}">Lupa password?</a>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>

<footer class="footer">
    <p class="mb-0">&copy; 2025 Tracer Study Universitas Ahmad Dahlan</p>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    AOS.init({ duration: 600, once: true });
</script>

</body>
</html>
