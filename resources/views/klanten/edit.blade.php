@extends('layouts.default')

@section('title', 'Klant Bewerken')

@section('content')
    <div class="container">
        <div class="button">
            <h1 class="form-title">Klant Bewerken</h1>

            <form action="{{ route('klanten.update', $klant->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="naam">Naam:</label>
                    <input type="text" id="naam" name="klant_naam" class="form-control" value="{{ $klant->naam }}"
                        required>
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" class="form-control" value="{{ $klant->email }}"
                        required>
                </div>
                <div class="form-group">
                    <label for="nummer">Telefoonnummer:</label>
                    <input type="text" id="nummer" name="nummer" class="form-control" value="{{ $klant->nummer }}"
                        required>
                </div>
                <div class="button">
                    <button type="submit" class="add-button button">Opslaan</button>
                </div>
            </form>
        </div>
    </div>
@endsection
