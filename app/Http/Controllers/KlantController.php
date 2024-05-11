<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;

class KlantController extends Controller
{
    public function index()
    {
        $klanten = Booking::all();
        return view('klanten.index', compact('klanten'));
    }

    public function create()
    {
        return view('klanten.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'klant_naam' => 'required|string',
            'email' => 'required|email|unique:klanten',
            'nummer' => 'required|string',
        ]);

        Booking::create($request->all());

        return redirect()->route('klanten.index')->with('success', 'Klant is succesvol toegevoegd.');
    }

    public function edit(Booking $klant)
    {
        return view('klanten.edit', compact('klant'));
    }

    public function update(Request $request, Booking $klant)
    {
        $request->validate([
            'klant_naam' => 'required|string',
            'email' => 'required|email|unique:klanten,email,' . $klant->id,
            'nummer' => 'required|string',
        ]);

        $klant->update($request->all());

        return redirect()->route('klanten.index')->with('success', 'Klant is succesvol bijgewerkt.');
    }

    public function destroy(Booking $klant)
    {
        $klant->delete();
        return redirect()->route('klanten.index')->with('success', 'Klant is succesvol verwijderd.');
    }
}
