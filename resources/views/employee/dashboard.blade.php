@extends('layouts.default')

@section('title', 'Employee Dashboard')

@section('content')
    <div class="container">
        <div class="dashboard-grid">
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
                <div class="content-grid">
                    <div class="planning-box">
                        <div class="geen-activiteit">
                            <h2>Planning</h2>
                            <img src="#" alt="geen activiteit image">
                            <p>Geen opkomende activiteiten vandaag</p>
                        </div>
                        <div class="planning">
                            <h2>Planning</h2>
                            <ul class="planning-list">
                                <li class="planning-item">tijdsduur / Dienst</li>
                            </ul>
                        </div>
                    </div>
                    <div class="gegevens-box">
                        <div class="aanwezige-werknemers">
                            <div class="aanwezige-werknemers-title-box">
                                <h2 class="aanwezige-werknemers-title">wie werkt er vandaag</h2>
                            </div>
                            <ul class="aanwezige-werknemers-list">
                                <li class="aanwezige-werknemers-item">naam / hoeveelheid-afspraken / tijdsduur</li>
                            </ul>
                        </div>
                        <div class="klanten-vandaag">
                            <div class="klanten-vandaag-title-box">
                                <h2 class="klanten-vandaag-title">Klanten vandaag</h2>
                            </div>
                            <p>aantal / klanten totaal</p>
                            <p>aantal / terugkerende klanten</p>
                            <p>aantal / nieuwe klanten</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection



