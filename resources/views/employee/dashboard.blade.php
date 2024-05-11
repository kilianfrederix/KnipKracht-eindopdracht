@extends('layouts.default')

@section('title', 'Employee Dashboard')

@section('content')
    <div class="container">
        <div class="dashboard-grid">
            <div class="dashboard-sidebar">
                <h2>Sidebar</h2>
                <ul>
                    <li><a href="{{ route('employee.dashboard') }}">Dashboard</a></li>
                    <li><a href="{{ route('dashboard.index') }}">Bookings</a></li>
                    <li><a href="{{ route('employee.kappers') }}">Kappers</a></li>
                    <li><a href="{{ route('employee.klanten') }}">Klanten</a></li>
                    <li><a href="{{ route('employee.diensten') }}">Diensten</a></li>
                </ul>
            </div>
            <div class="dashboard-content">
                <div class="content-grid">
                    <div class="planning-box">
                        <div class="geen-activiteit">
                            <h2>Planning</h2>
                            @if ($formattedBookings->isEmpty())
                                <img src="#" alt="geen activiteit image">
                                <p>Geen opkomende activiteiten vandaag</p>
                            @else
                                <ul class="planning-list">
                                    @foreach($formattedBookings as $booking)
                                        <li class="planning-item">
                                            {{ $booking['kapper'] }} -
                                            {{ $booking['klant_naam'] }} -
                                            {{ $booking['title'] }} -
                                            Datum: {{ $booking['formatted_date'] }} -
                                            Uur: {{ $booking['formatted_time'] }}
                                        </li>
                                    @endforeach
                                </ul>
                            @endif
                        </div>
                    </div>
                    <div class="gegevens-box">
                        <div class="aanwezige-werknemers">
                            <div class="aanwezige-werknemers-title-box">
                                <h2 class="aanwezige-werknemers-title">Wie werkt er vandaag</h2>
                            </div>
                            @if($kappersVandaag->isEmpty())
                                <p>Er hoeft niemand te werken vandaag.</p>
                            @else
                                <ul class="aanwezige-werknemers-list">
                                    {{-- Filter kappers op basis van vandaag --}}
                                    @foreach($kappersVandaag as $kapper)
                                        <li class="aanwezige-werknemers-item">{{ $kapper->naam }} / {{ $kapper->email }} / {{ $kapper->nummer }}</li>
                                    @endforeach
                                </ul>
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



