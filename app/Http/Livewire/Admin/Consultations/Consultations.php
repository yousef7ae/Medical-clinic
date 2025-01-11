<?php

namespace App\Http\Livewire\Admin\Consultations;

use App\Models\Consultation;
use Livewire\Component;
use Livewire\WithPagination;

class Consultations extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    protected $listeners = ['refreshModal'];

    public $search, $name_patient, $notes, $name, $deleteId, $consultation_id, $create_consultation, $type, $date, $prescription_id, $create_prescription;

    public function search()
    {
        $this->page = 1;
    }

    function mount()
    {
        if (array_key_exists(request('type'), Consultation::typeList(false))) {
            $this->type = request('type');
        }
    }

    public function deleteId($id)
    {
        $this->deleteId = $id;
    }

    public function EditConsultation($id)
    {
        $this->consultation_id = $id;
    }

    public function CreateConsultation()
    {
        $this->create_consultation = rand(0, 10000);
    }

    public function CreatePrescription($consultation_id)
    {
        $this->consultation_id = $consultation_id;
    }

    public function refreshModal()
    {
        $this->consultation_id = "";
        $this->create_consultation = "";
        $this->create_prescription = "";
    }

    public function delete()
    {

        $consultations = Consultation::findOrFail($this->deleteId);

        if (!auth()->user()->can('consultations delete')) {
            $this->emit('error', 'does not have the right permissions.');
            return false;
        }

        $consultations->delete();
        $this->emit('success', __("Deleted successfully"));
    }

    public function render()
    {
        $consultations = Consultation::query();

        if ($this->notes) {
            $consultations = $consultations->where('notes', 'LIKE', '%' . $this->notes . '%');
        }

        if ($this->date) {
            $consultations = $consultations->where('date', $this->date);
        }

        if ($this->name) {
            $consultations = $consultations->where('name', 'LIKE', '%' . $this->name . '%');
        }

        if ($this->name_patient) {
            $consultations = $consultations->whereHas("patient", function ($q) {
                return $q->where('name', 'LIKE', "%" . $this->name_patient . "%");
            });
        }

        if (array_key_exists($this->type, Consultation::typeList(false))) {
            $consultations = $consultations->where('type', $this->type);
        }

        $consultations = $consultations->orderBy('created_at', "DESC")->paginate(10);
        return view('livewire.admin.consultations.consultations', compact('consultations'))->layout('layouts.admins.app');
    }
}
