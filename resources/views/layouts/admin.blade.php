<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title', 'Admin Festival')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: #f2f7f8;
            font-family: Arial, sans-serif;
            color: #25313d;
        }

        .admin-navbar {
            background: #087f85;
        }

        .admin-container {
            max-width: 1100px;
            margin: auto;
            padding: 30px 16px;
        }

        .admin-card {
            border: 0;
            border-radius: 16px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, .05);
        }

        .btn-teal {
            background: #0c9da3;
            border-color: #0c9da3;
            color: white;
        }

        .btn-teal:hover {
            background: #087f85;
            border-color: #087f85;
            color: white;
        }

        .table th {
            white-space: nowrap;
        }
    </style>
</head>

<body>

    <nav class="navbar navbar-dark admin-navbar">
        <div class="container">
            <a class="navbar-brand fw-bold" href="{{ route('admin.event-links.index') }}">
                SPMB Matahati
            </a>

            <div class="d-flex gap-2">
                <a href="{{ route('public.home') }}" target="_blank" class="btn btn-sm btn-light">
                    Lihat Website
                </a>

                <a href="{{ route('admin.backgrounds.index') }}" class="btn btn-sm btn-outline-light">
                    Background
                </a>

                @auth
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf

                        <div class="d-flex align-items-center gap-2">
                            <span class="text-white small d-none d-md-inline">
                                {{ session('admin_name', 'Admin') }}
                            </span>

                            <a href="{{ route('public.home') }}" target="_blank" class="btn btn-sm btn-light">
                                Lihat Website
                            </a>

                            <form action="{{ route('admin.logout') }}" method="POST">
                                @csrf

                                <button type="submit" class="btn btn-sm btn-outline-light">
                                    Logout
                                </button>
                            </form>
                        </div>

                    </form>
                @endauth
            </div>
        </div>
    </nav>

    <main class="admin-container">
        @if (session('error'))
            <div class="alert alert-warning">
                {{ session('error') }}
            </div>
        @endif

        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Periksa kembali formulir:</strong>
                <ul class="mb-0 mt-2">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @yield('content')

    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>

    @stack('scripts')

</body>

</html>
