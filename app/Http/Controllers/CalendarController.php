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

            // Gebruik de kleur van de dienst voor het evenement
            $color = null;
            switch ($dienst->name) {
                case 'knippen':
                    $color = '#FFC0CB'; // Lichtroze
                    break;
                case 'Knippen':
                    $color = '#87CEEB'; // Lichtblauw
                    break;
                case 'Wassen Knippen Drogen':
                    $color = '#FF69B4'; // Fuchsia
                    break;
                case 'wassen knippen drogen':
                    $color = '#6495ED'; // Hemelsblauw
                    break;
                case 'scheren':
                    $color = '#556B2F'; // Donkergroen
                    break;
                case 'trimmen':
                    $color = '#FFD700'; // Goudgeel
                    break;
                case 'kleuren':
                    $color = '#FFA07A'; // Zalmroze
                    break;
                case 'Basis kleuren':
                    $color = '#9370DB'; // Medium paars
                    break;
                case 'kort Haar Kleuren':
                    $color = '#00FF00'; // Limoengroen
                    break;
                case 'Half Lang Haar Kleuren':
                    $color = '#FF4500'; // Oranjerood
                    break;
                case 'lang Haar Kleuren':
                    $color = '#8A2BE2'; // Blauwviolet
                    break;
                case 'Bruidskapsel':
                    $color = '#FF1493'; // Dieproze
                    break;
                case 'hoofd massage':
                    $color = '#808000'; // Olijfgroen
                    break;
                case 'Hoofd Massage':
                    $color = '#FFDAB9'; // Peachpuff
                    break;
                case 'permanent':
                    $color = '#800000'; // Donkerrood
                    break;
                case 'Krullen':
                    $color = '#9932CC'; // Donkerpaars
                    break;
            }
            // Voeg de boekingsgegevens toe aan de $events array
            $events[] = [
                'id' => $booking->id,
                'title' => $booking->title,
                'start' => $start->format('Y-m-d H:i:s'), // Gebruik de starttijd
                'end' => $end->format('Y-m-d H:i:s'), // Gebruik de eindtijd
                'color' => $color, // Gebruik de kleur van de dienst
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
            'kapper_id' => 'required|exists:kappers,id',
            'dienst_id' => 'required|exists:diensts,id',
        ]);

        $dienst = Dienst::findOrFail($request->dienst_id);

        // Bereken de einddatum op basis van de duur van de dienst
        $end_date = (new \DateTime($request->start_date))->add(new \DateInterval('PT' . $dienst->duration . 'M'));

        $color = $dienst->color;

        $booking = Booking::create([
            'title' => $dienst->name, // Gebruik de naam van de dienst als titel
            'start_date' => $request->start_date,
            'end_date' => $end_date->format('Y-m-d H:i:s'), // Sla de berekende einddatum op
            'kapper_id' => $request->kapper_id,
            'dienst_id' => $request->dienst_id,
        ]);

        return response()->json([
            'id' => $booking->id,
            'start' => $booking->start_date,
            'end' => $end_date->format('Y-m-d H:i:s'),
            'title' => $booking->title,
            'color' => $color,
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
