<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Kapper;
use App\Models\Dienst;
use Illuminate\Http\Request;

class CalendarController extends Controller
{
    public function index()
    {
        // Array om evenementen op te slaan
        $events = [];
        // Haal alle boekingen op en voeg kapper- en dienstgegevens toe
        $bookings = Booking::with('kapper', 'dienst')->orderBy('start_date')->get();
        foreach ($bookings as $booking) {
            // Haal de gegevens op van de Kapper voor deze afspraak
            $kapper = Kapper::find($booking->kapper_id);
            // Haal de gegevens op van de Dienst voor deze afspraak
            $dienst = Dienst::find($booking->dienst_id);

            // Bereken de eindtijd van het evenement
            $start = new \DateTime($booking->start_date);
            $end = new \DateTime($booking->end_date);

            // Bepaal de kleur op basis van de titel van de boeking
            $color = null;
            if ($booking->title == 'Test') {
                $color = '#FF2D00';
            }
            if ($booking->title == 'Test 1') {
                $color = '#00F3FF';
            }

            // Voeg de boekingsgegevens toe aan de $events array
            $events[] = [
                'id' => $booking->id,
                'title' => $booking->title,
                'start' => $start->format('Y-m-d H:i:s'), // Gebruik de starttijd
                'end' => $end->format('Y-m-d H:i:s'), // Gebruik de eindtijd
                'color' => $color,
                'kapper' => $kapper,
                'dienst' => $dienst,
            ];
        }

        // Haal alle beschikbare kappers op
        $kappers = Kapper::all();
        // Haal alle beschikbare diensten op
        $diensten = Dienst::all();

        // Geef de variabelen door aan de view
        return view('calendar.index', compact('events', 'kappers', 'diensten'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'kapper_id' => 'required|exists:kappers,id',
            'dienst_id' => 'required|exists:diensts,id',
        ]);

        $dienst = Dienst::findOrFail($request->dienst_id);

        $booking = Booking::create([
            'title' => $request->title,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'kapper_id' => $request->kapper_id,
            'dienst_id' => $request->dienst_id,
        ]);

        // Bereken de eindtijd van het evenement op basis van de duur van de dienst
        $end_date = (new \DateTime($request->start_date))->add(new \DateInterval('PT' . $dienst->duration . 'M'));

        $color = null;
        if ($booking->title == 'Test') {
            $color = '#FF2D00';
        }

        return response()->json([
            'id' => $booking->id,
            'start' => $booking->start_date,
            'end' => $end_date->format('Y-m-d H:i:s'),
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
