<?php

namespace App\Http\Livewire\Admin\Reservations;

use App\Models\Category;
use App\Models\Prescription;
use App\Models\Reservation;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ReservationsCreate extends Component
{
    public $reservation = ['category_id' => 0], $categories, $doctors, $patients;

    function mount()
    {

    }

    public function store()
    {
        $this->validate([
            'reservation.date' => 'required|date',
            'reservation.time_from' => 'required',
            'reservation.time_to' => 'required',
            'reservation.amount' => 'required|numeric',
            'reservation.patient_id' => 'required|exists:users,id',
            'reservation.reservation_type_id' => 'required|exists:reservation_types,id',
            'reservation.number' => '',
            'reservation.booking_list' => '',
            'reservation.notes' => '',
            'reservation.category_id' => '',
            'reservation.doctor_id' => '',
        ]);

        if (auth()->user()->hasRole('Doctor')) {
            $this->reservation['doctor_id'] = auth()->id();
        }

        $this->reservation['user_id'] = auth()->id();

        Reservation::create($this->reservation);

        $this->emit('success', __("Added successfully"));
    }

    public function render()
    {
        if (!auth()->user()->hasRole('Doctor')) {
            $this->doctors = User::role('Doctor')->where('category_id', $this->reservation['category_id'])->get();
        }
        $this->patients = User::role('Patient')->get();
        $this->categories = Category::get();

        return view('livewire.admin.reservations.reservations-create')->layout('layouts.admins.app');
    }
}
