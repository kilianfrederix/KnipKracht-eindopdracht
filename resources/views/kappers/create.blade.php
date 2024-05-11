@extends('layouts.default')

@section('title', 'Nieuwe Kapper Toevoegen')

@section('content')
    <div class="container">
        <h1>Nieuwe Kapper Toevoegen</h1>

        <form action="{{ route('kappers.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="naam">Naam:</label>
                <input type="text" id="naam" name="naam" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="nummer">Telefoonnummer:</label>
                <input type="text" id="nummer" name="nummer" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Toevoegen</button>
        </form>
    </div>
@endsection
