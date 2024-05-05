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
                @auth
                    <a href="/">Home</a>
                    <a href="{{ route('logout') }}">Logout</a>
                    @if(Auth::user()->is_employee)
                        <a href="{{ route('employee.dashboard') }}">Dashboard</a>
                    @endif
                @endauth
            </nav>
        </header>

        <main>
            @yield('content')
        </main>

        <footer class="main-footer">
            <div class="footer-content">
                @auth
                    <p>Welcome {{ Auth::user()->username }} {{ Auth::user()->is_employee }}</p>
                @endauth
            </div>
        </footer>
    </div>

</body>

</html>


