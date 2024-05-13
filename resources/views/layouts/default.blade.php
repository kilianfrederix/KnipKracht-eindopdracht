<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>@yield('title') - Default Layout</title>
    <link rel="stylesheet" href="{{ asset('styles/style.css') }}">
</head>

<body style="display: flex; flex-direction: column; min-height: 100vh;">
    <div style="flex: 1;">
        <header class="main-header">
            <nav class="main-navigation">
                <div class="header-grid">
                    <div class="nav-content-left">
                        <a class="nav-links @if (Request::is('/')) active @endif"
                            href="{{ route('home') }}">Home</a>
                        <a class="nav-links @if (Request::is('about')) active @endif"
                            href="{{ route('about') }}">About
                            us</a>
                        @auth
                            @if (Auth::user()->is_employee)
                                <a class="nav-links @if (Request::is('employee/dashboard')) active @endif"
                                    href="{{ route('employee.dashboard') }}">Dashboard</a>
                            @endif
                        @endauth
                    </div>
                    <div class="nav-content-middle">
                        <img src="{{ asset('images/Knip-Kracht.png') }}" alt="Logo">
                    </div>
                    <div class="nav-content-right">
                        <a class="afspraak-maken-btn @if (Request::is('calendar')) active @endif"
                            href="{{ route('calendar.index') }}">Maak een afspraak</a>
                    </div>
                </div>
            </nav>
        </header>
        <section>
            @yield('content')
        </section>
    </div>
    <footer class="main-footer">
        <div class="footer-content">
            <div class="footer-grid">
                <div class="footer-content-left">
                    <a class="nav-links @if (Request::is('/')) active @endif"
                        href="{{ route('home') }}">Home</a>
                    <a class="nav-links @if (Request::is('about')) active @endif"
                        href="{{ route('about') }}">About us</a>
                </div>
                <div class="footer-content-middle"></div>
                <div class="footer-content-right">
                    @auth
                        @if (Auth::user()->is_employee)
                            <h2><a class="nav-links-hidden" href="{{ route('logout') }}">Welcome
                                    {{ Auth::user()->username }}</a></h2>
                        @else
                            <h2><a class="nav-links" href="{{ route('login.get') }}">Login</a></h2>
                        @endif
                    @endauth
                    @guest
                        <a class="nav-links" href="{{ route('login.get') }}"><img
                                src="{{ asset('images/Knip-Kracht.png') }}" alt="Logo"></a>
                    @endguest
                </div>
            </div>
        </div>
    </footer>
    <script src="{{ asset('javascript/afspraken.js') }}"></script>
</body>

</html>
