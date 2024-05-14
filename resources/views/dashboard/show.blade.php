@extends('layouts.default')

@section('title', 'booking info')

@section('content')
    <div class="container">
        <div class="booking-content">
            <h1>Boeking Details</h1>
            <table class="aanwezige-werknemers-table">
                <thead>
                    <tr>
                        <th>Kapper</th>
                        <th>Klant</th>
                        <th>Dienst</th>
                        <th>start datum</th>
                        <th>Eind datum</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="aanwezige-werknemers-row">
                        <td>{{ $booking->kapper->naam }}</td>
                        <td>{{ $booking->klant->naam }}</td>
                        <td>{{ $booking->title }}</td>
                        <td>{{ $booking->start_date }}</td>
                        <td>{{ $booking->end_date }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
