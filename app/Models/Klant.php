<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Klant extends Model
{
    protected $fillable = ['naam', 'email', 'telefoon'];

    /**
     * Definieer de relatie tussen Klant en Afspraak: Een klant kan meerdere afspraken hebben.
     */
    public function afspraken(): HasMany
    {
        return $this->hasMany(Afspraak::class);
    }
}
