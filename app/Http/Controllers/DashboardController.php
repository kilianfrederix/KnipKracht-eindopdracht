<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $bookings = Booking::all();

        return view('dashboard.index', compact('bookings'));
    }

    public function show($id)
    {
        $booking = Booking::findOrFail($id);

        return view('dashboard.show', compact('booking'));
    }
}
