<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    // Methode voor het weergeven van het werknemersdashboard
    public function dashboard()
    {
        // Hier kun je logica toevoegen om gegevens op te halen die je wilt weergeven op het werknemersdashboard
        // Voorbeeld: $appointments = Appointment::where('employee_id', Auth::id())->get();

        // Geef het werknemersdashboardview terug, eventueel met gegevens
        return view('employee.dashboard');
    }
}
