<?php

// app/Models/Booking.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = ['behandeling', 'kapper', 'datum', 'tijd', 'naam', 'email', 'telefoon'];

    public function dienst()
    {
        return $this->belongsTo(Dienst::class);
    }

    public function kapper()
    {
        return $this->belongsTo(Kapper::class);
    }
}
