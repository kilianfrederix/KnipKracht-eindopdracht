<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{
    // Methode voor het weergeven van het klantendashboard
    public function dashboard()
    {
        // Debug-stap: Controleer of de methode wordt aangeroepen
        // dd('Customer dashboard method is called.');

        // Debug-stap: Controleer of de gebruiker is ingelogd
        // dd(Auth::check()); // Moet true retourneren als de gebruiker is ingelogd

        // Debug-stap: Als de gebruiker is ingelogd, kun je gegevens ophalen en doorgeven aan de view
        if (Auth::check()) {
            $user = Auth::user();
            $appointments = $user->appointments;
            return view('customer.dashboard', compact('appointments'));
        }
        return view('customer.dashboard');
    }
}
