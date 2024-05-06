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
        <header>
            <nav class="main-nav">
                    <a href="/">Home</a>
                    <a href="{{ route('afspraak.get')}}">Afspraken</a>
                    <a href="{{route('login.get')}}">Login</a>
                @auth
                    <a href="{{ route('logout') }}">Logout</a>
                    @if(Auth::user()->is_employee)
                        <a href="{{ route('employee.dashboard') }}">Dashboard</a>
                    @endif
                @endauth
            </nav>
        </header>


        <section class="main-container">
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


