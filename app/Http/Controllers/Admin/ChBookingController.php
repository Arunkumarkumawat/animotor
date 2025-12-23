<?php

namespace App\Http\Controllers\Admin;

use App\Models\CBooking;
use App\Mail\ChBookingAccepted;
use App\Http\Controllers\Controller;
use App\Mail\ChBookingCancelled;
use Illuminate\Support\Facades\Mail;

class ChBookingController extends Controller
{
    public function index()
    {
        $items = CBooking::with(['car', 'user'])->paginate(30);
        return view('admin.ch_bookings.index', compact('items'));
    }

    public function show($id){
        $booking = CBooking::findOrFail($id);
        return view('admin.ch_bookings.show', compact('booking'));
    }

    public function updateStatus($id, $status)
    {
        $booking = CBooking::findOrFail($id);
        $booking->status = $status;
        $booking->save();

        if($status == 'accepted'){
            // Send acceptance email
            Mail::to($booking->user->email)->send(new ChBookingAccepted($booking));
        } else {
            Mail::to($booking->user->email)->send(new ChBookingCancelled($booking));
        }
        
        return redirect()->route('admin.ch_bookings.show', $id)->with('success', 'Booking status updated successfully.');
    }
}