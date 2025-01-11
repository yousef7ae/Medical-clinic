<?php

namespace App\Http\Livewire\Admin\Visits;

use App\Models\Category;
use App\Models\User;
use App\Models\Visit;
use Livewire\Component;

class VisitsEdit extends Component
{
    public $visit ,$categories ,$doctors ,$patients;

    function mount($id){

        $visit = Visit::findOrFail($id);
        $this->visit = $visit->toArray();

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
            'visit.blood_pressure' => 'required',
            'visit.temperature' => 'required',
            'visit.sugar' => 'required',
            'visit.number_sessions' => 'required',
            'visit.waiting_list' => 'required',
            'visit.diagnosis' => 'required',
            'visit.detection_date' => 'required',
            'visit.notes' => '',
            'visit.visit_type_id' => '',
            'visit.user_id' => '',
            'visit.patient_id' => '',
            'visit.doctor_id' => '',
            'visit.category_id' => '',
        ]);

        $visit = Visit::findOrFail($this->visit['id']);
        $visit->update($this->visit);
        $this->emit('success',__("Updated successfully"));
    }

    public function render()
    {
        return view('livewire.admin.visits.visits-edit')->layout('layouts.admins.app');
    }
}
