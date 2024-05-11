@extends('layouts.default')

@section('title', 'bookings')

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
                <h1>Alle Boekingen</h1>
                <div>
                    <input type="text" placeholder="Zoeken">
                </div>
                <div class="klanten-list">
                    <div class="klanten-item">
                            <div class="klanten-label">Kapper</div>
                        @foreach($bookings as $booking)
                            <li> <a href="{{ route('dashboard.show', $booking->id) }}">{{ $booking->kapper->naam }}</a></li>
                        @endforeach
                    </div>
                    <div class="klanten-item">
                            <div class="klanten-label">klant</div>
                        @foreach($bookings as $booking)
                            <li> <a href="{{ route('dashboard.show', $booking->id) }}">{{ $booking->klant_naam }}</a></li>
                        @endforeach
                    </div>
                    <div class="klanten-item">
                        <div class="klanten-label">dienst</div>
                        @foreach($bookings as $booking)
                            <li> <a href="{{ route('dashboard.show', $booking->id) }}">{{ $booking->title }}</a></li>
                        @endforeach
                    </div>
                    <div class="klanten-item">
                        <div class="klanten-label">Start Datum</div>
                        @foreach($bookings as $booking)
                            <li> <a href="{{ route('dashboard.show', $booking->id) }}">{{ $booking->start_date }}</a></li>
                        @endforeach
                    </div>
                    <div class="klanten-item">
                        <div class="klanten-label">Start Uur</div>
                        @foreach($bookings as $booking)
                            <li> <a href="{{ route('dashboard.show', $booking->id) }}">{{ $booking->start_date }}</a></li>
                        @endforeach
                    </div>
                    <div class="klanten-item">
                        <div class="klanten-label">Eind Datum</div>
                        @foreach($bookings as $booking)
                            <li> <a href="{{ route('dashboard.show', $booking->id) }}">{{ $booking->end_date }}</a></li>
                        @endforeach
                    </div>
                    <div class="klanten-item">
                        <div class="klanten-label">Eind Uur</div>
                        @foreach($bookings as $booking)
                            <li> <a href="{{ route('dashboard.show', $booking->id) }}">{{ $booking->end_date }}</a></li>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection




