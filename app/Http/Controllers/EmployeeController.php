<?php

namespace App\Http\Controllers;

use App\Models\Klant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmployeeController extends Controller
{
    // Methode voor het weergeven van het werknemersdashboard
    public function dashboard()
    {
        // Controleer of de gebruiker een werknemer is
        if (Auth::check() && Auth::user()->is_employee) {
            // Gebruiker is een werknemer, toon het werknemersdashboard
            return view('employee.dashboard');
        } else {
            // Gebruiker is geen werknemer, stuur ze naar de homepagina
            return redirect()->route('home');
        }
    }

    public function klanten()
    {
        return view('employee.klanten');
    }



    public function berichten()
    {
        return view('employee.berichten');
    }
}
