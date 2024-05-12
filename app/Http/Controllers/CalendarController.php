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
                    $color = '#FF899D'; // Lichtroze
                    break;
                case 'Knippen':
                    $color = '#87CEEB'; // Lichtblauw
                    break;
                case 'Wassen-Knippen-Drogen':
                    $color = '#FF69B4'; // Fuchsia
                    break;
                case 'wassen-knippen-drogen':
                    $color = '#6495ED'; // Hemelsblauw
                    break;
                case 'scheren':
                    $color = '#68A200'; // Donkergroen
                    break;
                case 'trimmen':
                    $color = '#12836c'; // Goudgeel
                    break;
                case 'kleuren':
                    $color = '#C83C00'; // Zalmroze
                    break;
                case 'Basis-kleuren':
                    $color = '#9370DB'; // Medium paars
                    break;
                case 'kort-Haar-Kleuren':
                    $color = '#E14667'; // Limoengroen
                    break;
                case 'Half-Lang-Haar-Kleuren':
                    $color = '#A81E3C'; // Oranjerood
                    break;
                case 'lang-Haar-Kleuren':
                    $color = '#850B25'; // Blauwviolet
                    break;
                case 'Bruidskapsel':
                    $color = '#FF1493'; // Dieproze
                    break;
                case 'hoofd-massage':
                    $color = '#FF9F4D'; // Olijfgroen
                    break;
                case 'Hoofd-Massage':
                    $color = '#CD88FF'; // Peachpuff
                    break;
                case 'permanent':
                    $color = '#C40E0E'; // Donkerrood
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
            'title' => $dienst->name, // Gebruik de naam van de dienst als titel
            'start_date' => $request->start_date,
            'end_date' => $end_date->format('Y-m-d H:i:s'), // Sla de berekende einddatum op
            'kapper_id' => $request->kapper_id,
            'dienst_id' => $request->dienst_id,
            'klant_id' => $klant->id, // Gebruik klant_id van gemaakte of bestaande klant
        ]);

        return response()->json([
            'id' => $booking->id,
            'start' => $booking->start_date,
            'end' => $end_date->format('Y-m-d H:i:s'),
            'title' => $booking->title,
            'color' => $color,
            'klant_id' => $klant->id, // Geef klant_id terug in de JSON-respons
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
