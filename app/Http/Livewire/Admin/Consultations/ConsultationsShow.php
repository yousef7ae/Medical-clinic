<?php

namespace App\Http\Livewire\Admin\Consultations;

use App\Models\Consultation;
use App\Models\PatintConsultionAttach;
use Livewire\Component;
use Livewire\WithFileUploads;

class ConsultationsShow extends Component
{
    use WithFileUploads;
    public $consultation = ['allergy' => 0, 'medical_history' => 0, 'medical_history2' => 0, 'medical_history3' => 0, 'surgery' => 0, 'surgery2' => 0, 'surgery3' => 0],
        $attachments = [],
        $images;

    function mount($id)
    {
        $consultation = Consultation::findOrFail($id);
        $this->images = $consultation->attachments;
        $this->consultation = $consultation->toArray();
    }

    public function update()
    {
        $this->validate([
            'consultation.disease' => 'nullable|max:255',
            'consultation.type' => 'nullable|in:1,2',
            'consultation.date' => 'nullable|date',
            'consultation.amount' => 'nullable|numeric',
            'consultation.notes' => 'nullable|string',
        ]);

        $consultation = Consultation::findOrFail($this->consultation['id']);

        if (isset($this->consultation['medical_history'])) {
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
        if (isset($this->consultation['allergy'])) {
            if ($this->consultation['allergy'] == 1) {
                $this->validate([
                    'consultation.allergy_text' => 'required',
                    'consultation.allergy_date' => 'required',
                ]);
            } else {
                $this->consultation['allergy_text'] = null;
                $this->consultation['allergy_date'] = null;
            }
        }

        $consultation->update($this->consultation);
        if (isset($this->attachments)) {
            foreach ($this->attachments as $key => $attachment) {
                $name = $attachment->store('user/attachment', 'public');
                PatintConsultionAttach::create(['consultations_id' => $consultation->id, 'attachment' => $name]);
            }
        }
        $this->emit('success', __('Updated successfully'));
    }

    public function render()
    {
        return view('livewire.admin.consultations.consultations-show')->layout('layouts.admins.app');
    }
}
