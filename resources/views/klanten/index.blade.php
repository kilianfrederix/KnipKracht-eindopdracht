@extends('layouts.default')

@section('title', 'Alle Klanten')

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
                <h1>Alle Klanten</h1>

                @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                <a href="{{ route('klanten.create') }}" class="btn btn-primary">Nieuwe Klant Toevoegen</a>

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
                        @foreach ($klanten as $klant)
                            <tr class="aanwezige-werknemers-row">
                                <td>{{ $klant->naam }}</td>
                                <td>{{ $klant->email }}</td>
                                <td>{{ $klant->nummer }}</td>
                                <td>
                                    <a href="{{ route('klanten.edit', $klant->id) }}" class="btn btn-primary">Bewerken</a>
                                    <form action="{{ route('klanten.destroy', $klant->id) }}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Weet je zeker dat je deze klant wilt verwijderen?')">Verwijderen</button>
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
