@extends('layouts.default')

@section('title', 'Kappers')

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
                <h1>Alle Kappers</h1>
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
                        @foreach ($kappers as $kapper)
                            <tr>
                                <td>{{ $kapper->naam }}</td>
                                <td>{{ $kapper->email }}</td>
                                <td>{{ $kapper->nummer }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
