<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Kapper;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class EmployeeController extends Controller
{
    // Methode voor het weergeven van het werknemersdashboard
    public function dashboard()
    {
        // Controleer of de gebruiker een werknemer is
        if (Auth::check() && Auth::user()->is_employee) {
            // Haal alle boekingen op
            $bookings = Booking::all();
            // Filter de boekingen van vandaag
            $todayBookings = Booking::whereDate('start_date', Carbon::today())->get();
            // Haal alle kappers op
            $kappers = Kapper::all();
            // Filter de kappers die vandaag moeten werken
            $kappersVandaag = $todayBookings->pluck('kapper')->unique('id');

            // Formatteer de datum en het uur
            $formattedBookings = $todayBookings->map(function ($booking) {
                return [
                    'kapper' => $booking->kapper->naam,
                    'klant_naam' => $booking->klant->naam,
                    'title' => $booking->title,
                    'formatted_date' => $booking->start_date->format('d-m-Y'),
                    'formatted_start_time' => $booking->start_date->format('H:i'),
                    'formatted_end_time' => $booking->end_date->format('H:i'),
                ];
            });

            // Bereken het aantal terugkerende en nieuwe klanten
            $klantNamen = $todayBookings->pluck('klant_id')->toArray();
            $aantalTerugkerend = count(array_filter(array_count_values($klantNamen), function ($count) {
                return $count > 1;
            }));
            $aantalNieuw = count(array_filter(array_count_values($klantNamen), function ($count) {
                return $count === 1;
            }));

            // Stuur de gegevens naar de weergave
            return view('employee.dashboard', compact('formattedBookings', 'todayBookings', 'kappers', 'kappersVandaag', 'bookings', 'aantalTerugkerend', 'aantalNieuw'));
        } else {
            // Gebruiker is geen werknemer, stuur ze naar de homepagina
            return redirect()->route('home');
        }
    }
}
