@extends('layouts.default')

@section('title', 'Alle Klanten')

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
                <h1>Alle Klanten</h1>

                @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                <a href="{{ route('klanten.create') }}" class="btn btn-primary">Nieuwe Klant Toevoegen</a>

                <table class="table">
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
                        <tr>
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
