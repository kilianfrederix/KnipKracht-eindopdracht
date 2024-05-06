<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Afspraak extends Model
{
    protected $table = 'afspraken'; // De naam van de tabel in de database

    protected $fillable = [
        'behandeling', 'kapper', 'datum', 'tijd', 'naam', 'email', 'telefoon',
    ];

    // Optioneel: definieer eventuele relatie-methoden met andere modellen hier
}
