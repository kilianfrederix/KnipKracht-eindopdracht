<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Kapper;
use App\Models\Dienst;
use App\Models\Klant;
use Illuminate\Http\Request;

class CalendarController extends Controller
{
    public function index()
    {
        $events = [];

        $bookings = Booking::with('kapper', 'dienst')->orderBy('start_date')->get();
        foreach ($bookings as $booking) {
            $kapper = Kapper::find($booking->kapper_id);
            $dienst = Dienst::find($booking->dienst_id);
            $start = new \DateTime($booking->start_date);
            $end = new \DateTime($booking->end_date);
            $color = null;
            switch ($dienst->name) {
                case 'knippen':
                    $color = '#FF899D'; // Lichtroze
                    break;
                case 'Knippen':
                    $color = '#87CEEB'; // Lichtblauw
                    break;
                case 'Wassen-Knippen-Drogen':
                    $color = '#FF69B4'; // Lichtroze
                    break;
                case 'wassen-knippen-drogen':
                    $color = '#6495ED'; // Hemelsblauw
                    break;
                case 'scheren':
                    $color = '#68A200'; // Donkergroen
                    break;
                case 'trimmen':
                    $color = '#12836c'; // DonkerAppelBlauwZeeGroen
                    break;
                case 'kleuren':
                    $color = '#C83C00'; // Oranjerood
                    break;
                case 'Basis-kleuren':
                    $color = '#9370DB'; // Medium paars
                    break;
                case 'kort-Haar-Kleuren':
                    $color = '#E14667'; // DonkerRoze
                    break;
                case 'Half-Lang-Haar-Kleuren':
                    $color = '#A81E3C'; // HeelDonkerRoze
                    break;
                case 'lang-Haar-Kleuren':
                    $color = '#850B25'; // HeelDonkerRood
                    break;
                case 'Bruidskapsel':
                    $color = '#FF1493'; // Hotpink
                    break;
                case 'hoofd-massage':
                    $color = '#FF9F4D'; // Oranje
                    break;
                case 'Hoofd-Massage':
                    $color = '#CD88FF'; // lavendel
                    break;
                case 'permanent':
                    $color = '#C40E0E'; // Donkerrood
                    break;
                case 'Krullen':
                    $color = '#9932CC'; // Donkerpaars
                    break;
            }

            $events[] = [
                'id' => $booking->id,
                'title' => $booking->title,
                'start' => $start->format('Y-m-d H:i:s'),
                'end' => $end->format('Y-m-d H:i:s'),
                'color' => $color,
            ];
        }
        $kappers = Kapper::all();
        $diensten = Dienst::all();

        return view('calendar.index', compact('events', 'kappers', 'diensten'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'start_date' => 'required|date',
            'kapper_id' => 'required|exists:kappers,id',
            'dienst_id' => 'required|exists:diensts,id',
            'naam' => 'required|string',
            'email' => 'required|email',
            'nummer' => 'required|string',
        ]);

        $klant = Klant::firstOrCreate([
            'naam' => $request->naam,
            'email' => $request->email,
            'nummer' => $request->nummer,
        ]);

        $dienst = Dienst::findOrFail($request->dienst_id);

        // Bereken de einddatum op basis van de duur van de dienst
        $end_date = (new \DateTime($request->start_date))->add(new \DateInterval('PT' . $dienst->duration . 'M'));

        $color = $dienst->color;

        $booking = Booking::create([
            'title' => $dienst->name,
            'start_date' => $request->start_date,
            'end_date' => $end_date->format('Y-m-d H:i:s'),
            'kapper_id' => $request->kapper_id,
            'dienst_id' => $request->dienst_id,
            'klant_id' => $klant->id,
        ]);

        return response()->json([
            'id' => $booking->id,
            'start' => $booking->start_date,
            'end' => $end_date->format('Y-m-d H:i:s'),
            'title' => $booking->title,
            'color' => $color,
            'klant_id' => $klant->id,
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
