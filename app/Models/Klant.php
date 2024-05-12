<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Klant extends Model
{
    protected $fillable = ['naam', 'email', 'nummer'];

    public function klantBookings()
    {
        return $this->hasMany(Booking::class);
    }
}
