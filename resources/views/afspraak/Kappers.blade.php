@extends('layouts.default')

@section('title', 'Kappers')

@section('content')
    <div class="container">
        <div>
        <h2>Kappers</h2>
            <ul>
                <li><a href="{{ route('behandeling.get')}}">Behandelingen</a></li>
                <li><a href="{{ route('kappers.get')}}">Kappers</a></li>
                <li><a href="{{ route('dag_tijd.get')}}">Dag & Tijd</a></li>
                <li><a href="{{ route('gegevens.get')}}">Gegevens</a></li>
                <li><a href="{{ route('overzicht.get')}}">Overzicht</a></li>
            </ul>
        </div>
    </div>
@endsection
