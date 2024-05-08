<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Dienst;
use App\Models\Kapper;
use Illuminate\Http\Request;

class CalendarController extends Controller
{
    public function index()
    {
        $events = array();
        $bookings = Booking::all();

        // Ophalen van diensten en kappers
        $diensten = Dienst::all();
        $kappers = Kapper::all();

        foreach ($bookings as $booking) {
            $color = null;
            if ($booking->title == 'Test') {
                $color = '#FF2D00';
            }
            if ($booking->title == 'Test 1') {
                $color = '#00F3FF';
            }
            $events[] = [
                'id' => $booking->id,
                'title' => $booking->title,
                'start' => $booking->start_date,
                'end' => $booking->end_date,
                'color' => $color
            ];
        }

        // Geef diensten, kappers en events door aan de view
        return view('calendar.index', [
            'events' => $events,
            'diensten' => $diensten,
            'kappers' => $kappers
        ]);
    }
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'dienst_id' => 'required|exists:diensts,id', // Valideer of de dienst_id bestaat in de diensten tabel
            'kapper_id' => 'required|exists:kappers,id', // Valideer of de kapper_id bestaat in de kappers tabel
        ]);

        $booking = Booking::create([
            'title' => $request->title,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'dienst_id' => $request->dienst_id, // Voeg de dienst_id toe aan de nieuwe boeking
            'kapper_id' => $request->kapper_id, // Voeg de kapper_id toe aan de nieuwe boeking
        ]);

        $color = null;
        if ($booking->title == 'Test') {
            $color = '#FF2D00';
        }

        return response()->json([
            'id' => $booking->id,
            'start' => $booking->start_date,
            'end' => $booking->end_date,
            'title' => $booking->title,
            'color' => $color ? $color : '',
        ]);
    }


    public function update(Request $request, $id)
    {
        $booking = Booking::find($id);
        if (!$booking) {
            return response()->json([
                'error' => 'Unable to locate the event'
            ], 404);
        };
        $booking->update([
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
        ]);
        return response()->json('Event updated');
    }

    public function destroy($id)
    {
        $booking = Booking::find($id);
        if (!$booking) {
            return response()->json([
                'error' => 'Unable to locate the event'
            ], 404);
        };
        $booking->delete();
        return $id;
    }
}
