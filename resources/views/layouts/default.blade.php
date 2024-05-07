<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title') - Default Layout</title>
    <link rel="stylesheet" href="{{ asset('styles/style.css') }}">
</head>

<body>

    <div>

        <header class="main-header">
            <img src="#" alt="Logo">
            <nav class="main-nav">
                <a class="nav-link" href="{{ route('home') }}">Home</a>
                <a class="nav-link" href="{{ route('about') }}">About us</a>
                <a class="nav-link" href="{{ route('contact') }}">Contact</a>
                <a class="nav-link" href="{{ route('login.get') }}">Login</a>
                <a class="afspraak-maken-btn" href="{{ route('afspraak.get') }}">Maak een afspraak</a>
                @auth
                    <a href="{{ route('logout') }}">Logout</a>
                    @if (Auth::user()->is_employee)
                        <a href="{{ route('employee.dashboard') }}">Dashboard</a>
                    @endif
                @endauth
            </nav>
        </header>



        <section>
            @yield('content')
        </section>

        <footer class="main-footer">
            <div class="footer-content">
                @auth
                    <p>Welcome {{ Auth::user()->username }} {{ Auth::user()->is_employee }}</p>
                @endauth
            </div>
        </footer>
    </div>
    <script src="{{ asset('javascript/afspraken.js') }}"></script>

</body>

</html>
