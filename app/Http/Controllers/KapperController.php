<?php

namespace App\Http\Controllers;

use App\Models\Kapper;
use Illuminate\Http\Request;

class KapperController extends Controller
{
    public function index()
    {
        $kappers = Kapper::all();
        return view('kappers.index', compact('kappers'));
    }

    public function create()
    {
        return view('kappers.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'naam' => 'required|string',
            'email' => 'required|email|unique:kappers',
            'nummer' => 'required|string',
        ]);

        Kapper::create($request->all());

        return redirect()->route('kappers.index')->with('success', 'Kapper is succesvol toegevoegd.');
    }

    public function edit(Kapper $kapper)
    {
        return view('kappers.edit', compact('kapper'));
    }

    public function update(Request $request, Kapper $kapper)
    {
        $request->validate([
            'naam' => 'required|string',
            'email' => 'required|email|unique:kappers,email,' . $kapper->id,
            'nummer' => 'required|string',
        ]);

        $kapper->update($request->all());

        return redirect()->route('kappers.index')->with('success', 'Kapper is succesvol bijgewerkt.');
    }

    public function destroy(Kapper $kapper)
    {
        $kapper->delete();
        return redirect()->route('kappers.index')->with('success', 'Kapper is succesvol verwijderd.');
    }
}
