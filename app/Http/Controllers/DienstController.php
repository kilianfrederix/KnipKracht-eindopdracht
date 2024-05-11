<?php

namespace App\Http\Controllers;

use App\Models\Dienst;
use Illuminate\Http\Request;

class DienstController extends Controller
{
    public function index()
    {
        $diensten = Dienst::all();
        return view('diensten.index', compact('diensten'));
    }

    public function create()
    {
        return view('diensten.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'geslacht' => 'required|string',
            'duration' => 'required|integer',
            'price' => 'required|numeric',
        ]);

        Dienst::create($request->all());

        return redirect()->route('diensten.index')->with('success', 'Dienst is succesvol toegevoegd.');
    }

    public function edit(Dienst $dienst)
    {
        return view('diensten.edit', compact('dienst'));
    }

    public function update(Request $request, Dienst $dienst)
    {
        $request->validate([
            'name' => 'required|string',
            'geslacht' => 'required|string',
            'duration' => 'required|integer',
            'price' => 'required|numeric',
        ]);

        $dienst->update($request->all());

        return redirect()->route('diensten.index')->with('success', 'Dienst is succesvol bijgewerkt.');
    }

    public function destroy(Dienst $dienst)
    {
        $dienst->delete();
        return redirect()->route('diensten.index')->with('success', 'Dienst is succesvol verwijderd.');
    }
}
