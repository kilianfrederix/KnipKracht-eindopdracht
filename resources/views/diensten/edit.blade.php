@extends('layouts.default')

@section('title', 'Dienst Bewerken')

@section('content')
    <div class="container">
        <h1>Dienst Bewerken</h1>

        <form action="{{ route('diensten.update', $dienst->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Naam:</label>
                <input type="text" id="name" name="name" class="form-control" value="{{ $dienst->name }}" required>
            </div>
            <div class="form-group">
                <label for="geslacht">Geslacht:</label>
                <input type="text" id="geslacht" name="geslacht" class="form-control" value="{{ $dienst->geslacht }}" required>
            </div>
            <div class="form-group">
                <label for="duration">Duur (minuten):</label>
                <input type="number" id="duration" name="duration" class="form-control" value="{{ $dienst->duration }}" required>
            </div>
            <div class="form-group">
                <label for="price">Prijs:</label>
                <input type="number" id="price" name="price" class="form-control" value="{{ $dienst->price }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Opslaan</button>
        </form>
    </div>
@endsection
