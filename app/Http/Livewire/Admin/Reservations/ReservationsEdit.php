<?php

namespace App\Http\Livewire\Admin\Reservations;

use App\Models\Category;
use App\Models\Reservation;
use App\Models\User;
use Livewire\Component;

class ReservationsEdit extends Component
{
    public $reservation, $categories, $doctors, $patients;

    function mount($id)
    {
        $reservation = Reservation::findOrFail($id);
        $this->reservation = $reservation->toArray();

        if (!auth()->user()->hasRole('Doctor')) {
            $this->doctors = User::role('Doctor')->where('category_id', $this->reservation['category_id'])->get();
        }
        $this->patients = User::role('Patient')->get();
        $this->categories = Category::get();
    }

    public function update()
    {
        $this->validate([
            'reservation.number' => 'required',
            'reservation.booking_list' => '',
            'reservation.date' => 'required',
            'reservation.amount' => 'required',
            'reservation.notes' => '',
            'reservation.reservation_type_id' => '',
            'reservation.category_id' => '',
            'reservation.doctor_id' => '',
            'reservation.patient_id' => '',
        ]);

        $reservation = Reservation::findOrFail($this->reservation['id']);
        $reservation->update($this->reservation);
        $this->emit('success', __("Updated successfully"));
    }

    public function render()
    {
        return view('livewire.admin.reservations.reservations-edit')->layout('layouts.admins.app');
    }
}
