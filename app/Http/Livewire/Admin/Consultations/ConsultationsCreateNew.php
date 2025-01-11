<?php

namespace App\Http\Livewire\Admin\Consultations;

use App\Models\Category;
use App\Models\Consultation;
use App\Models\Insurance;
use App\Models\User;
use Livewire\Component;

class ConsultationsCreateNew extends Component
{
    public $patients,$consultation = [ 'medical_history' => 0, 'medical_history2' => 0, 'medical_history3' => 0, 'surgery' => 0, 'surgery2' => 0, 'surgery3' => 0], $image, $role_id, $insurances, $categories, $doctors, $array;

    function mount()
    {
        if (!auth()->user()->hasRole('Doctor')) {
            $this->doctors = User::role('Doctor')->get();
        }
        $this->patients = User::role('Patient')->get();
        $this->categories = Category::get();
        $this->insurances = Insurance::get();
    }

    public function store()
    {

        $this->validate([
            'consultation.patient_id' => '',
            'consultation.doctor_id' => '',
            'consultation.category_id' => '',
            'consultation.disease' => 'required|max:255',
            'consultation.type' => 'required|in:1,2',
            'consultation.date' => 'required|date',
            'consultation.amount' => 'nullable|numeric',
            'consultation.notes' => 'nullable|string',
            'consultation.email' => 'nullable|email|unique:users,email',
            'consultation.mobile' => 'numeric',
            'consultation.job' => 'nullable',
            'consultation.insurance_id' => 'nullable',
            'consultation.weight' => 'nullable|numeric',
            'consultation.height' => 'nullable|numeric',
            'consultation.previous_operations' => 'nullable',
            'consultation.address' => 'nullable',
            'consultation.medical_history' => 'nullable|boolean',
            'consultation.medical_history2' => 'nullable|boolean',
            'consultation.medical_history3' => 'nullable|boolean',
            'consultation.surgery' => 'nullable|boolean',
            'consultation.surgery2' => 'nullable|boolean',
            'consultation.surgery3' => 'nullable|boolean',
            'consultation.other_diagnosis' => 'nullable',
            'consultation.other_surgery' => 'nullable',
            'consultation.other_medication' => 'nullable',
            'consultation.lab' => 'nullable',
            'consultation.international_index' => 'nullable',
            'consultation.examination' => 'nullable',
            'consultation.impression_recommendation' => 'nullable',
        ]);

        $this->consultation['serial_number'] = date('dmYgis');

        if ($this->consultation['medical_history'] == 1) {
            $this->validate([
                'consultation.medical_history_text' => 'required',
                'consultation.medical_history_drug' => 'required',
            ]);
        } else {
            $this->consultation['medical_history_text'] = null;
            $this->consultation['medical_history_drug'] = null;
        }

        if ($this->consultation['medical_history2'] == 1) {
            $this->validate([
                'consultation.medical_history_text2' => 'required',
                'consultation.medical_history_drug2' => 'required',
            ]);
        } else {
            $this->consultation['medical_history_text2'] = null;
            $this->consultation['medical_history_drug2'] = null;
        }

        if ($this->consultation['medical_history3'] == 1) {
            $this->validate([
                'consultation.medical_history_text3' => 'required',
                'consultation.medical_history_drug3' => 'required',
            ]);
        } else {
            $this->consultation['medical_history_text3'] = null;
            $this->consultation['medical_history_drug3'] = null;
        }

        if ($this->consultation['surgery'] == 1) {
            $this->validate([
                'consultation.surgery_text' => 'required',
                'consultation.surgery_date' => 'required',
            ]);
        } else {
            $this->consultation['surgery_text'] = null;
            $this->consultation['surgery_date'] = null;
        }

        if ($this->consultation['surgery2'] == 1) {
            $this->validate([
                'consultation.surgery2_text' => 'required',
                'consultation.surgery2_date' => 'required',
            ]);
        } else {
            $this->consultation['surgery2_text'] = null;
            $this->consultation['surgery2_date'] = null;
        }

        if ($this->consultation['surgery3'] == 1) {
            $this->validate([
                'consultation.surgery3_text' => 'required',
                'consultation.surgery3_date' => 'required',
            ]);
        } else {
            $this->consultation['surgery3_text'] = null;
            $this->consultation['surgery3_date'] = null;
        }

        Consultation::create($this->consultation);

        $this->emit('success', __("Added successfully"));
        return redirect()->route('admin.consultations');

    }

    public function render()
    {
        return view('livewire.admin.consultations.consultations-create-new')->layout('layouts.admins.app');
    }

}
