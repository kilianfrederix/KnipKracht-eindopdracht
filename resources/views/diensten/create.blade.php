<!-- resources/views/diensten/create.blade.php -->

@extends('layouts.default')

@section('title', 'Nieuwe Dienst Toevoegen')

@section('content')
    <div class="container">
        <h1>Nieuwe Dienst Toevoegen</h1>

        <form action="{{ route('diensten.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Naam:</label>
                <input type="text" id="name" name="name" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="geslacht">Geslacht:</label>
                <input type="text" id="geslacht" name="geslacht" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="duration">Duur (minuten):</label>
                <input type="number" id="duration" name="duration" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="price">Prijs:</label>
                <input type="number" id="price" name="price" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Toevoegen</button>
        </form>
    </div>
@endsection
