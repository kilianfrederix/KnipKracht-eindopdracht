<?php

// Dienst.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dienst extends Model
{
    protected $fillable = ['name', 'geslacht', 'price', 'duration'];

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}
