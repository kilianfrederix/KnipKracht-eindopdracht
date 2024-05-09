<?php

// Kapper.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kapper extends Model
{
    protected $fillable = ['naam', 'email', 'nummer'];

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}
