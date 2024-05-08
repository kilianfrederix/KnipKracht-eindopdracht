<?php

// app/Models/Dienst.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dienst extends Model
{
    protected $fillable = ['name', 'geslacht', 'price'];

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}
