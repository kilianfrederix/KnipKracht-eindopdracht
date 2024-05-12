<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>@yield('title') - Default Layout</title>
    <link rel="stylesheet" href="{{ asset('styles/style.css') }}">
</head>
    <body style="display: flex; flex-direction: column; min-height: 100vh;">
        <div style="flex: 1;"> <!-- Flex-grow: 1 to allow footer push to the bottom -->
            <header class="main-header">
                <img src="#" alt="Logo">
                <nav class="main-navigation">
                    <a class="nav-links @if(Request::is('/')) active @endif" href="{{ route('home') }}">Home</a>
                    <a class="nav-links @if(Request::is('about')) active @endif" href="{{ route('about') }}">About us</a>
                    <a class="nav-links @if(Request::is('contact')) active @endif" href="{{ route('contact') }}">Contact</a>
                    <a class="nav-links @if(Request::is('login')) active @endif" href="{{ route('login.get') }}">Login</a>
                    @auth
                        <a class="nav-links @if(Request::is('logout')) active @endif" href="{{ route('logout') }}">Logout</a>
                        @if (Auth::user()->is_employee)
                            <a class="nav-links @if(Request::is('employee/dashboard')) active @endif" href="{{ route('employee.dashboard') }}">Dashboard</a>
                        @endif
                    @endauth
                    <a class="afspraak-maken-btn @if(Request::is('calendar')) active @endif" href="{{ route('calendar.index') }}">Maak een afspraak</a>
                </nav>
            </header>
            <section>
                @yield('content')
            </section>
        </div>
        <footer class="main-footer">
            <div class="footer-content">
                @auth
                    <p>Welcome {{ Auth::user()->username }} {{ Auth::user()->is_employee }}</p>
                @endauth
            </div>
        </footer>
        <script src="{{ asset('javascript/afspraken.js') }}"></script>
    </body>
</html>

