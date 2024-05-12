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
                        <li><a href="{{ route('kappers.index') }}">Kappers</a></li>
                        <li><a href="{{ route('klanten.index') }}">Klanten</a></li>
                        <li><a href="{{ route('diensten.index') }}">Diensten</a></li>
                    </ul>
            </div>
            <div class="dashboard-content">
                <h1>Alle Boekingen</h1>
                <div>
                    <input type="text" placeholder="Zoeken">
                </div>
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
                            <td><a href="{{ route('dashboard.show', $booking->id) }}">{{ $booking->kapper->naam }}</a></td>
                            <td><a href="{{ route('dashboard.show', $booking->id) }}">{{ $booking->klant->naam }}</a></td>
                            <td><a href="{{ route('dashboard.show', $booking->id) }}">{{ $booking->title }}</a></td>
                            <td>{{ $booking->start_date }}</td>
                            <td>{{ $booking->start_date }}</td>
                            <td>{{ $booking->end_date }}</td>
                            <td>{{ $booking->end_date }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection




