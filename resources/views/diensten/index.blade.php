@extends('layouts.default')

@section('title', 'Alle Diensten')

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
                <h1>Alle Diensten</h1>
                @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif
                <a href="{{ route('diensten.create') }}" class="btn btn-primary">Nieuwe Dienst Toevoegen</a>
                <table class="aanwezige-werknemers-table">
                    <thead>
                        <tr>
                            <th>Naam</th>
                            <th>Geslacht</th>
                            <th>Duur (min)</th>
                            <th>Prijs</th>
                            <th>Actie's</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($diensten as $dienst)
                        <tr class="aanwezige-werknemers-row">
                            <td>{{ $dienst->name }}</td>
                            <td>{{ $dienst->geslacht }}</td>
                            <td>{{ $dienst->duration }}</td>
                            <td>{{ $dienst->price }}</td>
                            <td>
                                <a href="{{ route('diensten.edit', $dienst->id) }}" class="btn btn-primary">Bewerken</a>
                                <form action="{{ route('diensten.destroy', $dienst->id) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Weet je zeker dat je deze dienst wilt verwijderen?')">Verwijderen</button>
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

