<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AfspraakController extends Controller
{
    public function afspraak()
    {
        return view('afspraak.afspraak');
    }

    public function behandeling()
    {
        return view('afspraak.behandeling');
    }

    public function kappers()
    {
        return view('afspraak.kappers');
    }

    public function dag_tijd()
    {
        return view('afspraak.dag_tijd');
    }

    public function gegevens()
    {
        return view('afspraak.gegevens');
    }

    public function overzicht()
    {
        return view('afspraak.overzicht');
    }
}
