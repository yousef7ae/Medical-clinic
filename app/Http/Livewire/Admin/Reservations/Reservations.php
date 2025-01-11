<?php

namespace App\Http\Livewire\Admin\Reservations;

use App\Models\Reservation;
use Livewire\Component;
use Livewire\WithPagination;

class Reservations extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    protected $listeners = ['refreshModal'];


    public $search, $notes,$name,$date, $number, $deleteId, $reservation_id ,$image ,$imageTemp ,$create_reservation ,$status ,$Status;

    public function search()
    {
        $this->page = 1;
    }

    function mount(){
        if (array_key_exists(request('status'), Reservation::statusList(false))) {
            $this->status = request('status');
        }
    }

    public function Status($id)
    {
        $this->Status = $id;
    }

    public function active()
    {
        $status = '1';
        $reservations = Reservation::findOrFail($this->Status);
        $reservations->status = $status;
        $reservations->save();
        $this->emit('success',__("Activated successfully"));

    }

    public function inactive()
    {

        $status = '0';
        $reservations = Reservation::findOrFail($this->Status);
        $reservations->status = $status;
        $reservations->save();
        $this->emit('success',__("Canceled successfully"));

    }

    public function soon()
    {

        $status = '2';
        $reservations = Reservation::findOrFail($this->Status);
        $reservations->status = $status;
        $reservations->save();
        $this->emit('success',__("Soon successfully"));

    }


    public function deleteId($id)
    {
        $this->deleteId = $id;
    }

    public function EditReservation($id)
    {
        $this->reservation_id = $id;
    }
    public function CreateReservation()
    {
        $this->create_reservation = rand(0,10000);
    }


    public function refreshModal()
    {
        $this->reservation_id = "";
        $this->create_reservation = "";
    }


    public function delete()
    {

        $reservations = Reservation::findOrFail($this->deleteId);

        if (!auth()->user()->can('reservations delete')) {
            $this->emit('error','does not have the right permissions.');
            return false;
        }

        $reservations->delete();
        $this->emit('success',__("Deleted successfully"));

    }

    public function render()
    {
        $reservations = Reservation::query();

        if (!auth()->user()->hasRole('Admin')) {
            if (auth()->user()->hasRole('Doctor')) {
                $reservations = $reservations->where('doctor_id', auth()->id());
            }
        }

        if ($this->date) {
            $reservations = $reservations->where('date',  $this->date );
        }

        if ($this->notes) {
            $reservations = $reservations->where('notes', 'LIKE', '%' . $this->notes . '%');
        }
        if ($this->number) {
            $reservations = $reservations->where('number', 'LIKE', '%' . $this->number . '%');
        }

        if ($this->name) {
            $reservations = $reservations->whereHas("patient", function ($q) {
                return $q->where('name', 'LIKE', "%" . $this->name . "%");
            });
        }

        if(array_key_exists($this->status,Reservation::statusList(false))){
            $reservations = $reservations->where('status', $this->status);
        }

        $reservations = $reservations->orderBy('created_at', "DESC")->paginate(10);
        return view('livewire.admin.reservations.reservations', compact('reservations'))->layout('layouts.admins.app');
    }

}
