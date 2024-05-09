<?php

// Booking.php (in app/Models directory)

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = ['title', 'start_date', 'end_date', 'kapper_id', 'dienst_id'];

    public function kapper()
    {
        return $this->belongsTo(Kapper::class);
    }

    public function dienst()
    {
        return $this->belongsTo(Dienst::class);
    }
}
