<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Login Admin - Festival Akbar 2026</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #dff3f4, #b9e6e8);
        }

        .login-card {
            width: 100%;
            max-width: 420px;
            padding: 32px;
            background: white;
            border-radius: 22px;
            box-shadow: 0 12px 35px rgba(0, 70, 75, .12);
        }

        .login-icon {
            width: 65px;
            height: 65px;
            margin: 0 auto 18px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 20px;
            background: #dff3f4;
            font-size: 30px;
        }

        .btn-teal {
            background: #0c9da3;
            border-color: #0c9da3;
            color: white;
            padding: 12px;
            font-weight: 600;
        }

        .btn-teal:hover {
            background: #087f85;
            border-color: #087f85;
            color: white;
        }

        .form-control {
            padding: 11px 13px;
        }
    </style>
</head>

<body>

    <div class="login-card">

        <div class="login-icon">🔐</div>

        <div class="text-center mb-4">
            <h3 class="fw-bold mb-2">Login Admin</h3>
            <p class="text-secondary mb-0">
                Festival Akbar PPDAMDG 2026
            </p>
        </div>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-warning">
                {{ session('error') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger">
                {{ $errors->first() }}
            </div>
        @endif

        <form action="{{ route('admin.login.process') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="username" class="form-label fw-semibold">
                    Username
                </label>

                <input type="text" name="username" id="username" class="form-control" value="{{ old('username') }}"
                    placeholder="Masukkan username" autocomplete="username" required autofocus>
            </div>

            <div class="mb-4">
                <label for="password" class="form-label fw-semibold">
                    Password
                </label>

                <input type="password" name="password" id="password" class="form-control"
                    placeholder="Masukkan password" autocomplete="current-password" required>
            </div>

            <button type="submit" class="btn btn-teal w-100">
                Masuk ke Dashboard
            </button>
        </form>

        <div class="text-center mt-4">
            <a href="{{ route('public.home') }}" class="text-secondary small text-decoration-none">
                ← Kembali ke halaman publik
            </a>
        </div>

    </div>

</body>

</html>
