<?php

namespace App\Http\Livewire\Admin\Visits;

use App\Models\Category;
use App\Models\User;
use App\Models\Visit;
use Livewire\Component;

class VisitsCreate extends Component
{
    public $visit, $categories, $doctors, $patients;

    function mount()
    {
        if (!auth()->user()->hasRole('Doctor')) {
            $this->doctors = User::role('Doctor')->get();
        }
        $this->patients = User::role('Patient')->get();
        $this->categories = Category::get();
    }

    public function store()
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

        if (auth()->user()->hasRole('Doctor')) {
            $this->visit['doctor_id'] = auth()->id();
//            $this->visit['category_id'] = auth()->user()->category->id;
        }

        Visit::create($this->visit);

        $this->emit('success', __("Added successfully"));
        $this->visit = [];
    }

    public function render()
    {
        return view('livewire.admin.visits.visits-create')->layout('layouts.admins.app');
    }
}
