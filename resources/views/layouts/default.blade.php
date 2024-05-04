<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title') - Default Layout</title>
    <link rel="stylesheet" href="/styles/styles.css">
</head>

<body>

    <div class="container">
        <header>
            <h1>Databank communicatie</h1>
            <nav class="main-nav">
                @auth
                    @if(Auth::user()->is_employee)
                        <a href="{{ route('employee.dashboard') }}">Dashboard</a>
                    @else
                        <a href="{{ route('customer.dashboard') }}">Dashboard</a>
                    @endif
                    <a href="{{ route('logout') }}">Logout</a>
                @endauth
                @guest
                    <a href="/">Home</a>
                    <a href="{{ route('login.get') }}">Login</a>
                    <a href="{{ route('register.get') }}">Register</a>
                @endguest
            </nav>
        </header>

        <main>
            @yield('content')
        </main>

        <footer class="main-footer">
            @auth
                <p>Made with Laravel! Welcome {{ Auth::user()->username }} {{ Auth::user()->is_employee }}</p>
            @endauth
        </footer>
    </div>

</body>

</html>


