@extends('layouts.default')

@section('title', 'Alle Kappers')

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
                <div class="add-button-box">
                    <h1>Alle Kappers</h1>
                    @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
                    <a href="{{ route('kappers.create') }}" class="add-button">Nieuwe Kapper Toevoegen</a>
                </div>
                <table class="aanwezige-werknemers-table">
                    <thead>
                        <tr>
                            <th>Naam</th>
                            <th>Email</th>
                            <th>Telefoonnummer</th>
                            <th>Actie</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($kappers as $kapper)
                        <tr class="aanwezige-werknemers-row">
                            <td>{{ $kapper->naam }}</td>
                            <td>{{ $kapper->email }}</td>
                            <td>{{ $kapper->nummer }}</td>
                            <td class="button-box">
                                <a href="{{ route('kappers.edit', $kapper->id) }}" class="update-button">Bewerken</a>
                                <form action="{{ route('kappers.destroy', $kapper->id) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="delete-button" onclick="return confirm('Weet je zeker dat je deze kapper wilt verwijderen?')">Verwijderen</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
