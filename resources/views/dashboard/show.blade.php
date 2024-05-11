@extends('layouts.default')

@section('title', 'booking info')

@section('content')
    <div class="container">
        <h1>Boeking Details</h1>
        <p>Kapper {{ $booking->kapper->naam }}</p>
        <p>klant {{ $booking->klant_naam }}</p>
        <p>Titel: {{ $booking->title }}</p>
        <p>Start Datum: {{ $booking->start_date }}</p>
        <p>Eind Datum: {{ $booking->end_date }}</p>
    </div>
@endsection
