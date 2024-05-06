<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Kapper extends Model
{
    protected $fillable = ['naam', 'email', 'telefoon'];

    /**
     * Definieer de relatie tussen Kapper en Afspraak: Een kapper kan meerdere afspraken hebben.
     */
    public function afspraken(): HasMany
    {
        return $this->hasMany(Afspraak::class);
    }
}
