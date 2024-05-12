@extends('layouts.default')

@section('title', 'Employee Dashboard')

@section('content')
    <div class="container">
        <div class="dashboard-grid">
            <div class="dashboard-sidebar">
                <h2 class="dashboard-title">KnipKracht</h2>
                <ul class="nav-list">
                    <li class="dashboard-link @if(Request::is('employee/dashboard')) active @endif"><a href="{{ route('employee.dashboard') }}">Dashboard</a></li>
                    <li class="dashboard-link @if(Request::is('dashboard')) active @endif"><a href="{{ route('dashboard.index') }}">Bookings</a></li>
                    <li class="dashboard-link @if(Request::is('kappers')) active @endif"><a href="{{ route('kappers.index') }}">Kappers</a></li>
                    <li class="dashboard-link @if(Request::is('klanten')) active @endif"><a href="{{ route('klanten.index') }}">Klanten</a></li>
                    <li class="dashboard-link @if(Request::is('diensten')) active @endif"><a href="{{ route('diensten.index') }}">Diensten</a></li>
                </ul>
            </div>
            <div class="dashboard-items">
                <div class="content-grid">
                    <div class="planning-box">
                        <div class="geen-activiteit">
                            <h2 class="dashboard-title">Planning</h2>
                            @if ($formattedBookings->isEmpty())
                                <img src="#" alt="geen activiteit image">
                                <p>Geen opkomende activiteiten vandaag</p>
                            @else
                                <table class="aanwezige-werknemers-table">
                                    <thead>
                                        <tr>
                                            <th>Kapper</th>
                                            <th>Klant</th>
                                            <th>Dienst</th>
                                            <th>Datum</th>
                                            <th>Uur</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($formattedBookings as $booking)
                                        <tr class="aanwezige-werknemers-row">
                                            <td>{{ $booking['kapper'] }}</td>
                                            <td>{{ $booking['klant_naam'] }}</td>
                                            <td>{{ $booking['title'] }}</td>
                                            <td>{{ $booking['formatted_date'] }}</td>
                                            <td>{{ $booking['formatted_time'] }}</td>
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
                            @if($kappersVandaag->isEmpty())
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
                                        @foreach($kappersVandaag as $kapper)
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
@endsection



