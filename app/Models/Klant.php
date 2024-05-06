<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Klant extends Model
{
    protected $table = 'klanten'; // Dit geeft aan dat dit model overeenkomt met de "klanten" tabel in de database

    protected $fillable = ['naam', 'email', 'nummer'];

    /**
     * Definieer de relatie tussen Klant en Afspraak: Een klant kan meerdere afspraken hebben.
     */
    public function afspraken(): HasMany
    {
        return $this->hasMany(Afspraak::class);
    }
}
