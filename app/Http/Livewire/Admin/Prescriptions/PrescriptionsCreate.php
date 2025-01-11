<?php

namespace App\Http\Livewire\Admin\Prescriptions;

use App\Models\Category;
use App\Models\Consultation;
use App\Models\Prescription;
use App\Models\User;
use Livewire\Component;
use Livewire\WithFileUploads;

class PrescriptionsCreate extends Component
{
    use WithFileUploads;

    public $prescription, $categories, $doctors, $patients, $file, $consultation ;

    function mount($prescription_id, $consultation_id)
    {
        if (!auth()->user()->hasRole('Doctor')) {
            $this->doctors = User::role('Doctor')->get();
        }
        $this->patients = User::role('Patient')->get();
        $this->categories = Category::get();
        if ($consultation_id) {
            $this->consultation = Consultation::findOrFail($consultation_id);
            if ($this->consultation) {
                $this->prescription['consultation_id'] = $this->consultation->id;
                $this->prescription['patient_id'] = $this->consultation->patient_id;
                $this->prescription['doctor_id'] = $this->consultation->doctor_id;
            }
        }

    }

    public function store()
    {
        $this->validate([
            'prescription.name_drug' => 'required',
            'prescription.number_drug' => 'required',
            'prescription.medicine_dose' => 'required',
            'prescription.medicine_unit' => 'required',
            'prescription.number' => 'required|in:1,2,3,4,5,6,7,8,9,10,11,12,13,14,15',
            'prescription.notes' => '',
            'prescription.user_id' => '',
            'prescription.patient_id' => '',
            'prescription.doctor_id' => '',
            'prescription.category_id' => '',
            'prescription.consultation_id' => '',
            'prescription.take_method' => '',
            'prescription.dosing_frequency' => '',
            'prescription.date' => 'required',
        ]);

        if (auth()->user()->hasRole('Doctor')) {
            $this->prescription['doctor_id'] = auth()->id();
        }

        if (isset ($this->prescription['file'])) {
            $this->validate(['prescription.file' => 'max:10240|required|mimes:png,jpeg,pdf']);
            $this->prescription['file'] = $this->prescription['file']->store('prescriptions/files/' . $this->id);
        }

        Prescription::create($this->prescription);

        $this->emit('success', __("Added successfully"));
        $this->prescription = [];
    }

    public function render()
    {
        return view('livewire.admin.prescriptions.prescriptions-create')->layout('layouts.admins.app');
    }
}
