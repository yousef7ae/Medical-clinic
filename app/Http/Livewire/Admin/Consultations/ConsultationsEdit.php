<?php

namespace App\Http\Livewire\Admin\Consultations;

use App\Models\Category;
use App\Models\Consultation;
use App\Models\User;
use Livewire\Component;

class ConsultationsEdit extends Component
{
    public $consultation = [ 'medical_history' => 0, 'medical_history2' => 0, 'medical_history3' => 0, 'surgery' => 0, 'surgery2' => 0, 'surgery3' => 0] ,$categories  ,$doctors ,$patients;

    function mount($id){

        $consultation = Consultation::findOrFail($id);
        $this->consultation = $consultation->toArray();
        if (!auth()->user()->hasRole('Doctor')) {
            if (!auth()->user()->hasRole('Doctor')) {
            $this->doctors = User::role('Doctor')->get();
        }
        }
        $this->patients = User::role('Patient')->get();
        $this->categories = Category::get();

    }

    public function update()
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
        ]);



        $consultation = Consultation::findOrFail($this->consultation['id']);

        if (isset($this->consultation['medical_history'])){
            if ($this->consultation['medical_history'] == 1) {
                $this->validate([
                    'consultation.medical_history_text' => 'required',
                    'consultation.medical_history_drug' => 'required',
                ]);
            } else {
                $this->consultation['medical_history_text'] = null;
                $this->consultation['medical_history_drug'] = null;
            }
        }


        if (isset($this->consultation['medical_history2'])) {
            if ($this->consultation['medical_history2'] == 1) {
                $this->validate([
                    'consultation.medical_history_text2' => 'required',
                    'consultation.medical_history_drug2' => 'required',
                ]);
            } else {
                $this->consultation['medical_history_text2'] = null;
                $this->consultation['medical_history_drug2'] = null;
            }
        }
        if (isset($this->consultation['medical_history3'])) {
            if ($this->consultation['medical_history3'] == 1) {
                $this->validate([
                    'consultation.medical_history_text3' => 'required',
                    'consultation.medical_history_drug3' => 'required',
                ]);
            } else {
                $this->consultation['medical_history_text3'] = null;
                $this->consultation['medical_history_drug3'] = null;
            }
        }

        if (isset($this->consultation['surgery'])) {
            if ($this->consultation['surgery'] == 1) {
                $this->validate([
                    'consultation.surgery_text' => 'required',
                    'consultation.surgery_date' => 'required',
                ]);
            } else {
                $this->consultation['surgery_text'] = null;
                $this->consultation['surgery_date'] = null;
            }
        }
        if (isset($this->consultation['surgery2'])) {
        if ($this->consultation['surgery2'] == 1) {
            $this->validate([
                'consultation.surgery2_text' => 'required',
                'consultation.surgery2_date' => 'required',
            ]);
        } else {
            $this->consultation['surgery2_text'] = null;
            $this->consultation['surgery2_date'] = null;
        }
       }
        if (isset($this->consultation['surgery3'])) {
            if ($this->consultation['surgery3'] == 1) {
                $this->validate([
                    'consultation.surgery3_text' => 'required',
                    'consultation.surgery3_date' => 'required',
                ]);
            } else {
                $this->consultation['surgery3_text'] = null;
                $this->consultation['surgery3_date'] = null;
            }
        }

        $consultation->update($this->consultation);
        $this->emit('success',__("Updated successfully"));
    }

    public function render()
    {
        return view('livewire.admin.consultations.consultations-edit')->layout('layouts.admins.app');
    }

}
