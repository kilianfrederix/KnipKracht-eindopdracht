<?php

namespace App\Http\Controllers;

use App\Models\Klant;
use Illuminate\Http\Request;

class KlantController extends Controller
{
    public function index()
    {
        $klanten = Klant::all();
        return view('klanten.index', compact('klanten'));
    }

    public function create()
    {
        return view('klanten.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'naam' => 'required|string',
            'email' => 'required|email|unique:klants',
            'nummer' => 'required|string',
        ]);

        Klant::create($request->all());

        return redirect()->route('klanten.index')->with('success', 'Klant is succesvol toegevoegd.');
    }

    public function edit(Klant $klant)
    {
        return view('klanten.edit', compact('klant'));
    }

    public function update(Request $request, Klant $klant)
    {
        $request->validate([
            'naam' => 'required|string',
            'email' => 'required|email|unique:klants,email,' . $klant->id,
            'nummer' => 'required|string',
        ]);

        $klant->update($request->all());

        return redirect()->route('klanten.index')->with('success', 'Klant is succesvol bijgewerkt.');
    }

    public function destroy(Klant $klant)
    {
        $klant->delete();
        return redirect()->route('klanten.index')->with('success', 'Klant is succesvol verwijderd.');
    }
}
