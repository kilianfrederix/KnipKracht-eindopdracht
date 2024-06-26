<?php

// Booking.php (in app/Models directory)

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = ['title', 'start_date', 'end_date', 'kapper_id', 'dienst_id', 'klant_id'];

    protected $casts = [
        'start_date' => 'datetime',
        'end_date' => 'datetime',
    ];

    public function kapper()
    {
        return $this->belongsTo(Kapper::class);
    }

    public function dienst()
    {
        return $this->belongsTo(Dienst::class);
    }

    public function klant()
    {
        return $this->belongsTo(Klant::class);
    }
}
