@extends('layouts.default')

@section('title', 'Diensten')

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
                <h1>Alle Diensten</h1>
                <div>
                    <input type="text" placeholder="Zoeken">
                </div>
                <ul>
                    @foreach ($diensten as $dienst)
                        <li>{{ $dienst->name }} - {{ $dienst->geslacht }} - {{ $dienst->duration }} - Prijs: {{ $dienst->price }} </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endsection
