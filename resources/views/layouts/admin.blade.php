<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Admin Panel - @yield('title', 'Dashboard')</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0; 
            background: #f4f6f8;
        }
        header {
            background-color: #2d3748;
            color: white;
            padding: 1rem 2rem;
            font-size: 1.5rem;
        }
        nav {
            background: #4a5568;
            padding: 0.5rem 2rem;
        }
        nav a {
            color: #e2e8f0;
            text-decoration: none;
            margin-right: 1rem;
            font-weight: 600;
        }
        nav a:hover {
            color: white;
        }
        main {
            padding: 2rem;
            max-width: 900px;
            margin: auto;
            background: white;
            box-shadow: 0 0 8px rgb(0 0 0 / 0.1);
            border-radius: 6px;
            margin-top: 2rem;
        }
        footer {
            text-align: center;
            padding: 1rem;
            color: #718096;
            font-size: 0.9rem;
            margin-top: 3rem;
        }
        /* Buttons */
        button, a.button {
            background-color: #2b6cb0;
            color: white;
            padding: 0.6rem 1.2rem;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
        }
        button:hover, a.button:hover {
            background-color: #2c5282;
        }
    </style>
</head>
<body>
    <header>
        Admin Panel
    </header>
    <nav>
        <a href="{{ route('admin.menus.index') }}">Menus</a>
        <a href="{{ route('admin.pages.index') }}">Pages</a>
        <a href="{{ route('admin.products.index') }}">Products</a>
        <!-- Add other admin links here -->
        <a href="{{ url('/') }}" target="_blank">View Site</a>
    </nav>

    <main>
        @yield('content')
    </main>

    <footer>
        &copy; {{ date('Y') }} Your Company Name
    </footer>
</body>
</html>
