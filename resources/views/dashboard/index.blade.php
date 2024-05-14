@extends('layouts.default')

@section('title', 'bookings')

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
            <div class="dashboard-content">
                <h1>Alle Boekingen</h1>
                <table class="aanwezige-werknemers-table">
                    <thead>
                        <tr>
                            <th>Kapper</th>
                            <th>Klant</th>
                            <th>Dienst</th>
                            <th>Start Datum</th>
                            <th>Start Uur</th>
                            <th>Eind Datum</th>
                            <th>Eind Uur</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($bookings as $booking)
                            <tr class="aanwezige-werknemers-row">
                                <td><a href="{{ route('dashboard.show', $booking->id) }}" class="info-link">{{ $booking->kapper->naam }}</a></td>
                                <td><a href="{{ route('dashboard.show', $booking->id) }}" class="info-link">{{ $booking->klant->naam }}</a></td>
                                <td><a href="{{ route('dashboard.show', $booking->id) }}" class="info-link">{{ $booking->title }}</a></td>
                                <td>{{ \Carbon\Carbon::parse($booking->start_date)->format('Y-m-d') }}</td>
                                <td>{{ \Carbon\Carbon::parse($booking->start_date)->format('H:i') }}</td>
                                <td>{{ \Carbon\Carbon::parse($booking->end_date)->format('Y-m-d') }}</td>
                                <td>{{ \Carbon\Carbon::parse($booking->end_date)->format('H:i') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection






