@extends('layouts.default')

@section('title', 'Klanten')

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
                <h1>Alle Klanten</h1>
                <div>
                    <input type="text" placeholder="Zoeken">
                </div>
                <table>
                    <thead>
                        <tr>
                            <th>Naam</th>
                            <th>Email</th>
                            <th>Telefoonnummer</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($klanten as $klant)
                            <tr>
                                <td>{{ $klant->klant_naam }}</td>
                                <td>{{ $klant->email }}</td>
                                <td>{{ $klant->nummer }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
