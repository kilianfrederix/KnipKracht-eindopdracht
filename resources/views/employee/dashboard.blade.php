<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('styles/style.css') }}">
    <title>Dashboard</title>
</head>

<body>
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
    <div class="container">
        <div class="dashboard-grid">
            <div class="dashboard-sidebar">
                <h2 class="dashboard-title">KnipKracht</h2>
                <ul class="nav-list">
                    <li class="dashboard-link @if (Request::is('employee/dashboard')) active @endif"><a
                            href="{{ route('employee.dashboard') }}">Dashboard</a></li>
                    <li class="dashboard-link @if (Request::is('dashboard')) active @endif"><a
                            href="{{ route('dashboard.index') }}">Bookings</a></li>
                    <li class="dashboard-link @if (Request::is('kappers')) active @endif"><a
                            href="{{ route('kappers.index') }}">Kappers</a></li>
                    <li class="dashboard-link @if (Request::is('klanten')) active @endif"><a
                            href="{{ route('klanten.index') }}">Klanten</a></li>
                    <li class="dashboard-link @if (Request::is('diensten')) active @endif"><a
                            href="{{ route('diensten.index') }}">Diensten</a></li>
                </ul>
            </div>
            <div class="dashboard-items">
                <div class="content-grid">
                    <div class="planning-box">
                        <div class="geen-activiteit">
                            <h2 class="dashboard-title">Planning</h2>
                            @if ($formattedBookings->isEmpty())
                                <img src="{{ asset('images/free-schedule.svg') }}" alt="geen activiteit image">
                                <p>Geen opkomende activiteiten vandaag</p>
                            @else
                                <table class="aanwezige-werknemers-table">
                                    <thead>
                                        <tr>
                                            <th>Kapper</th>
                                            <th>Klant</th>
                                            <th>Dienst</th>
                                            <th>Datum</th>
                                            <th>Start</th>
                                            <th>Eind</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($formattedBookings as $booking)
                                            <tr class="aanwezige-werknemers-row">
                                                <td>{{ $booking['kapper'] }}</td>
                                                <td>{{ $booking['klant_naam'] }}</td>
                                                <td>{{ $booking['title'] }}</td>
                                                <td>{{ $booking['formatted_date'] }}</td>
                                                <td>{{ $booking['formatted_start_time'] }}</td>
                                                <td>{{ $booking['formatted_end_time'] }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            @endif
                        </div>
                    </div>
                    <div class="gegevens-box">
                        <div class="aanwezige-werknemers">
                            <div class="aanwezige-werknemers-title-box">
                                <h2 class="dashboard-title">Wie werkt er vandaag</h2>
                            </div>
                            @if ($kappersVandaag->isEmpty())
                                <p>Er hoeft niemand te werken vandaag.</p>
                            @else
                                <table class="aanwezige-werknemers-table">
                                    <thead>
                                        <tr>
                                            <th>Naam</th>
                                            <th>Email</th>
                                            <th>Nummer</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($kappersVandaag as $kapper)
                                            <tr class="aanwezige-werknemers-row">
                                                <td>{{ $kapper->naam }}</td>
                                                <td>{{ $kapper->email }}</td>
                                                <td>{{ $kapper->nummer }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            @endif
                        </div>
                        <div class="klanten-vandaag">
                            <div class="klanten-vandaag-title-box">
                                <h2 class="klanten-vandaag-title">Klanten vandaag</h2>
                            </div>
                            @if ($todayBookings->isNotEmpty())
                                <p>Aantal: {{ $todayBookings->count() }}</p>
                                <p>Aantal terugkerende klanten: {{ $aantalTerugkerend }}</p>
                                <p>Aantal nieuwe klanten: {{ $aantalNieuw }}</p>
                            @else
                                <p>Geen klanten vandaag</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer class="dashboard-main-footer">
        <div class="dashboard-footer-content">
            <div class="dashboard-footer-grid">
                <div class="dashboard-footer-content-left">
                    <a class="nav-links @if (Request::is('/')) active @endif"
                        href="{{ route('home') }}">Home</a>
                    <a class="nav-links @if (Request::is('about')) active @endif"
                        href="{{ route('about') }}">About us</a>
                </div>
                <div class="dashboard-footer-content-middle">
                    <img src="{{ asset('images/Knip-Kracht.png') }}" alt="Logo">
                </div>
                <div class="dashboard-footer-content-right">
                    @auth
                        @if (Auth::user()->is_employee)
                            <h2><a class="nav-links-hidden" href="{{ route('logout') }}">Welcome
                                    {{ Auth::user()->username }}</a></h2>
                        @else
                            <h2><a class="nav-links" href="{{ route('login.get') }}">Login</a></h2>
                        @endif

                    @endauth
                    @guest
                        <a class="nav-links" href="{{ route('login.get') }}">Login</a>
                    @endguest
                </div>
            </div>
        </div>
    </footer>
</body>

</html>
