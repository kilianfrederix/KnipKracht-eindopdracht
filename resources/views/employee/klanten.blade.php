@extends('layouts.default')

@section('title', 'Dashboard Klanten')

@section('content')
    <div class="container">
        <div class="dashboard-sidebar">
            <h2>Sidebar</h2>
            <ul>
                <li><a href="{{ route('employee.dashboard') }}">Dashboard</a></li>
                <li><a href="{{ route('employee.klanten') }}">Klanten</a></li>
                <li><a href="{{ route('employee.berichten') }}">Berichten</a></li>
                <li>Item 4</li>
            </ul>
        </div>
        <div class="dashboard-content">
            <h2>klanten</h2>
            <div>
                <input type="text" placeholder="Zoeken">
                <div class="button-box">
                    <input class="submit-button" type="submit" value="Klant toevoegen">
                </div>
            </div>
            <div class="klanten-list">
                <div class="klanten-item">
                    <div class="klanten-label">Naam</div>
                    <li>naam klant</li>
                </div>
                <div class="klanten-item">
                    <div class="klanten-label">Mobiel</div>
                    <li>nummer klant</li>
                </div>
                <div class="klanten-item">
                    <div class="klanten-label">Email</div>
                    <li>email klant</li>
                </div>
                <div class="klanten-item">
                    <div class="klanten-label">Nieuwsbrief</div>
                    <li>Ja / nee</li>
                </div>
                <div class="klanten-item">
                    <div class="klanten-label">Adres</div>
                    <li>adres klant</li>
                </div>
            </div>
        </div>
    </div>
@endsection
