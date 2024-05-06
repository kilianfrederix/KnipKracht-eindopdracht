@extends('layouts.default')

@section('title', 'Dashboard Berichten')

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
            <h1>Berichten</h1>
            <div>
                <input type="text" placeholder="Zoeken">
            </div>
            <div class="klanten-list">
                <div class="klanten-item">
                    <div class="klanten-label">icon</div>
                    <li>email icon</li>
                </div>
                <div class="klanten-item">
                    <div class="klanten-label">Verstuurd</div>
                    <div>
                        <li>Datum verzending</li>
                    </div>
                </div>
                <div class="klanten-item">
                    <div class="klanten-label">Type</div>
                    <li>type verzending</li>
                </div>
                <div class="klanten-item">
                    <div class="klanten-label">Klant</div>
                    <li>naam klant</li>
                </div>
                <div class="klanten-item">
                    <div class="klanten-label">Email</div>
                    <li>email klant</li>
                </div>
                <div class="klanten-item">
                    <div class="klanten-label">Bericht</div>
                    <li>type bericht</li>
                </div>
                <div class="klanten-item">
                    <div class="klanten-label">Status</div>
                    <li>bezord / niet bezorg</li>
                </div>
                <div class="klanten-item">
                    <div class="klanten-label">mislukt</div>
                    <li>opnieuw verzenden</li>
                </div>
            </div>
        </div>
    </div>
@endsection
