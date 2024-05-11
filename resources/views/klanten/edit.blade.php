@extends('layouts.default')

@section('title', 'Klant Bewerken')

@section('content')
    <div class="container">
        <h1>Klant Bewerken</h1>

        <form action="{{ route('klanten.update', $klant->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="klant_naam">Naam:</label>
                <input type="text" id="klant_naam" name="klant_naam" class="form-control" value="{{ $klant->klant_naam }}" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" class="form-control" value="{{ $klant->email }}" required>
            </div>
            <div class="form-group">
                <label for="nummer">Telefoonnummer:</label>
                <input type="text" id="nummer" name="nummer" class="form-control" value="{{ $klant->nummer }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Opslaan</button>
        </form>
    </div>
@endsection
