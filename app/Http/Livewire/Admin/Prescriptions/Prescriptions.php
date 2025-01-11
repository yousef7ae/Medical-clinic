<?php

namespace App\Http\Livewire\Admin\Prescriptions;

use App\Models\Prescription;
use Livewire\Component;
use Livewire\WithPagination;

class Prescriptions extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    protected $listeners = ['refreshModal'];


    public $search, $notes,$name, $name_drug, $deleteId, $prescription_id ,$image ,$imageTemp ,$create_prescription ,$status ,$Status;

    public function search()
    {
        $this->page = 1;
    }

    function mount(){
        if (array_key_exists(request('status'), Prescription::statusList(false))) {
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
        $prescriptions = Prescription::findOrFail($this->Status);
        $prescriptions->status = $status;
        $prescriptions->save();
        $this->emit('success',__("Activated successfully"));

    }

    public function inactive()
    {

        $status = '0';
        $prescriptions = Prescription::findOrFail($this->Status);
        $prescriptions->status = $status;
        $prescriptions->save();
        $this->emit('success',__("Canceled successfully"));

    }

    public function soon()
    {

        $status = '2';
        $prescriptions = Prescription::findOrFail($this->Status);
        $prescriptions->status = $status;
        $prescriptions->save();
        $this->emit('success',__("Soon successfully"));

    }


    public function deleteId($id)
    {
        $this->deleteId = $id;
    }

    public function EditPrescription($id)
    {
        $this->prescription_id = $id;
    }
    public function CreatePrescription()
    {
        $this->create_prescription = rand(0,10000);
    }


    public function refreshModal()
    {
        $this->prescription_id = "";
        $this->create_prescription = "";
    }


    public function delete()
    {

        $prescriptions = Prescription::findOrFail($this->deleteId);

        if (!auth()->user()->can('prescriptions delete')) {
            $this->emit('error','does not have the right permissions.');
            return false;
        }

        $prescriptions->delete();
        $this->emit('success',__("Deleted successfully"));


    }

    public function render()
    {
        $prescriptions = Prescription::query();

        if (!auth()->user()->hasRole('Admin')) {
            if (auth()->user()->hasRole('Doctor')) {
                $prescriptions = $prescriptions->where('doctor_id', auth()->id());
            }
        }

        if ($this->notes) {
            $prescriptions = $prescriptions->where('notes', 'LIKE', '%' . $this->notes . '%');
        }
        if ($this->name_drug) {
            $prescriptions = $prescriptions->where('name_drug', 'LIKE', '%' . $this->name_drug . '%');
        }

        if ($this->name) {
            $prescriptions = $prescriptions->whereHas("patient", function ($q) {
                return $q->where('name', 'LIKE', "%" . $this->name . "%");
            });
        }

        if(array_key_exists($this->status,Prescription::statusList(false))){
            $prescriptions = $prescriptions->where('status', $this->status);
        }

        $prescriptions = $prescriptions->orderBy('created_at', "DESC")->paginate(10);
        return view('livewire.admin.prescriptions.prescriptions', compact('prescriptions'))->layout('layouts.admins.app');
    }
}
