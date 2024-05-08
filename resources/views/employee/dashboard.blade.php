@extends('layouts.default')

@section('title', 'Employee Dashboard')

@section('content')
    <div class="container">
        <div class="dashboard-grid">
            <div class="dashboard-sidebar">
                <h2>Sidebar</h2>
                <ul>
                    <li><a href="{{ route('employee.dashboard') }}">Dashboard</a></li>
                    <li><a href="{{ route('klanten.index') }}">Klanten</a></li>
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



{{-- <!-- Modal -->
    <div class="modal fade" id="bookingModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Book an Appointment</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label for="title" class="form-label">Appointment Title</label>
                    <input type="text" class="form-control" id="title">
                    <span id="titleError" class="text-danger"></span>
                </div>
                <div class="mb-3">
                    <label for="behandeling" class="form-label">Treatment</label>
                    <select class="form-select" id="behandeling">
                        @foreach($diensten as $dienst)
                            <option value="{{ $dienst->id }}">{{ $dienst->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="kapper" class="form-label">Barber</label>
                    <select class="form-select" id="kapper">
                        @foreach($kappers as $kapper)
                            <option value="{{ $kapper->id }}">{{ $kapper->naam }}</option>
                        @endforeach
                    </select>
                </div>
                <!-- Voeg andere velden toe voor de datum, tijd, naam, e-mail, telefoon, etc. -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" id="saveBtn" class="btn btn-primary">Save</button>
            </div>
        </div>
    </div>
</div> --}}
