<?php

namespace App\Http\Controllers;

use App\Models\Afspraak;
use Illuminate\Http\Request;

class AfspraakController extends Controller
{
    public function afspraak()
    {
        return view('afspraak.afspraak');
    }

    public function opslaan(Request $request)
    {
        // Valideer de ingediende gegevens
        $validatedData = $request->validate([
            'behandeling' => 'required',
            'kapper' => 'required',
            'datum' => 'required',
            'tijd' => 'required',
            'naam' => 'required',
            'email' => 'required|email',
            'telefoon' => 'required|regex:/[0-9]{3}-[0-9]{3}-[0-9]{4}/',
        ]);

        // Sla de afspraak op in de database
        Afspraak::create($validatedData);

        // Redirect of toon een succesbericht
        return redirect()->route('afspraak.bedankt');
    }
}
