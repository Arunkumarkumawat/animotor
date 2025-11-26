<?php

namespace App\Livewire\Admin\Bookings;

use App\Models\Booking;
use Livewire\Component;
use Illuminate\Http\RedirectResponse;
use App\Services\NotificationService;

class Show extends Component
{
    public Booking $booking;

    public $status;

    public function mount(Booking $booking_item){
        $this->booking = $booking_item;
    }
    public function render()
    {
        return view('livewire.admin.bookings.show');
    }

    public function confirmBooking()
    {
        $this->dispatch('openConfirmModal', 'Delete User', 'Are you sure you want to delete this user?', 'deleteUser', ['999']);
    }

    public function acceptCancellation() : RedirectResponse
    {
        $booking = Booking::findOrFail($this->booking->id);

        if(!$booking->customer){
            return redirect()->back()->with('failure','Invalid Booking');
        }

        $booking->cancelled = 2;
        $booking->save();

        $notificationService = new NotificationService();
        $notificationService->notify('Cancellation accepted for booking ('.$booking->reference.')','notification','Booking Cancellation Accepted', $booking->customer);

        return redirect()->back()->with('success','Booking cancellation accepted');
    }

    public function denyCancellation() : RedirectResponse
    {
        $booking = Booking::findOrFail($this->booking->id);

        if(!$booking->customer){
            return redirect()->back()->with('failure','Invalid Booking');
        }

        $booking->cancelled = 3;
        $booking->save();

        $notificationService = new NotificationService();
        $notificationService->notify('Cancellation denied for booking ('.$booking->reference.')','notification','Booking Cancellation Denied', $booking->customer);

        return redirect()->back()->with('success','Booking cancellation denied');
    }
}
