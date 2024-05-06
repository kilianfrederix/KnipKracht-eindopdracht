<?php

namespace App\Http\Controllers;

use App\Models\Klant;

class KlantController extends Controller
{
    public function show($id)
    {
        $klant = Klant::findOrFail($id);
        $afspraken = $klant->afspraken;

        return view('klanten.show', compact('klant', 'afspraken'));
    }

    public function klanten()
    {
        $klanten = Klant::all();

        return view('klanten.index', compact('klanten'));
    }
}
