<?php

namespace App\Http\Controllers\Admin;

use App\Models\PhBooking;
use Illuminate\Http\Request;
use App\Events\BookingConfirmed;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Notifications\AccountNotification;

class PhBookingController extends Controller
{
    public function index()
    {
        $items = PhBooking::with(['car', 'user'])->paginate(30);
        return view('admin.ph_bookings.index', compact('items'));
    }

    public function show($id){
        $booking = PhBooking::findOrFail($id);
        return view('admin.ph_bookings.show', compact('booking'));
    }
}
