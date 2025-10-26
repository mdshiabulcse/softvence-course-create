<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Course Platform')</title>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background: #f8fafc;
            color: #334155;
            line-height: 1.6;
        }

        .navbar {
            background: white;
            padding: 1rem 2rem;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .nav-container {
            max-width: 1200px;
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            font-size: 1.5rem;
            font-weight: bold;
            color: #00AB0C;
            text-decoration: none;
        }

        .nav-links {
            display: flex;
            gap: 1.5rem;
            align-items: center;
        }

        .nav-link {
            color: #666;
            text-decoration: none;
        }

        .nav-link:hover {
            color: #3b82f6;
        }

        .btn {
            padding: 0.5rem 1rem;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            font-size: 0.9rem;
        }

        .btn-primary {
            background: #3b82f6;
            color: white;
        }

        .btn-outline {
            background: transparent;
            border: 1px solid #ddd;
            color: #666;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 2rem;
        }

        .error {
            color: #dc2626;
            font-size: 0.875rem;
            margin-top: 0.25rem;
        }

        .error-border {
            border-color: #dc2626 !important;
        }

        .alert {
            padding: 1rem;
            border-radius: 4px;
            margin-bottom: 1rem;
        }

        .alert-success {
            background: #dcfce7;
            border: 1px solid #22c55e;
            color: #166534;
        }

        .alert-error {
            background: #fee2e2;
            border: 1px solid #ef4444;
            color: #991b1b;
        }

        @media (max-width: 768px) {
            .nav-container {
                flex-direction: column;
                gap: 1rem;
            }

            .container {
                padding: 1rem;
            }
        }
    </style>
</head>
<body>
<nav class="navbar">
    <div class="nav-container">
        <a href="{{ url('/') }}" class="logo">
            <i class="fas fa-graduation-cap"></i> Softvence
        </a>
        <div class="nav-links">
            <a href="{{ route('courses.public') }}" class="nav-link">All Courses</a>
            @auth
                <a href="{{ route('courses.index') }}" class="nav-link">My Courses</a>
                <a href="{{ route('courses.create') }}" class="nav-link">Create New Course</a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="btn btn-outline">Logout</button>
                </form>
            @else
                <a href="{{ route('login') }}" class="nav-link">Login</a>
                <a href="{{ route('register') }}" class="btn btn-primary">Sign Up</a>
            @endauth
        </div>
    </div>
</nav>

<main>
    @yield('content')
</main>

<script>
    function showMessage(message, type = 'success') {
        const alert = document.createElement('div');
        alert.className = `alert alert-${type}`;
        alert.innerHTML = message;
        document.querySelector('main').prepend(alert);
        setTimeout(() => alert.remove(), 5000);
    }

    function showErrors(errors) {
        $('.error').remove();
        $('.error-border').removeClass('error-border');
        $.each(errors, function (field, messages) {
            const input = $(`[name="${field}"]`);
            input.addClass('error-border');
            input.after(`<div class="error">${messages[0]}</div>`);
        });
    }

    @if($errors->any())
    @foreach($errors->all() as $error)
    showMessage('{{ $error }}', 'error');
    @endforeach
    @endif
    @if(session('success'))
    showMessage('{{ session('success') }}', 'success');
    @endif
    @if(session('error'))
    showMessage('{{ session('error') }}', 'error');
    @endif
</script>

@yield('scripts')
</body>
</html>
