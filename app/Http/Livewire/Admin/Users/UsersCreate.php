<?php

namespace App\Http\Livewire\Admin\Users;

use App\Models\Category;
use App\Models\Insurance;
use App\Models\User;
use Livewire\Component;
use Livewire\WithFileUploads;

class UsersCreate extends Component
{
    use WithFileUploads;

    public $user = ['allergy' => 0, 'medical_history' => 0, 'medical_history2' => 0, 'medical_history3' => 0, 'surgery' => 0, 'surgery2' => 0, 'surgery3' => 0], $image, $role_id, $insurances, $categories, $doctors, $array;

    function mount()
    {
        if (auth()->user()->hasRole('Admin') or auth()->user()->hasRole('Secretarial')) {
            if (!auth()->user()->hasRole('Doctor')) {
                $this->doctors = User::role('Doctor')->get();
            }
        }

        $this->categories = Category::get();
        $this->insurances = Insurance::get();
    }

    public function store()
    {
        $this->validate([
            'user.name' => 'required|string',
         //   'user.category_id' => 'required|exists:categories,id',
            'user.birth_date' => 'nullable|date',
            'user.birth_place' => 'nullable',
            'user.occupation' => 'nullable',
            'user.id_number' => 'nullable|numeric',
            'user.email' => 'nullable|email|unique:users,email',
            'user.mobile' => 'nullable|numeric',
            'user.gender' => 'nullable|in:1,2,3,4,5',
            'user.status' => 'nullable|in:0,1,2',
            'user.job' => 'nullable',
            'user.insurance_id' => 'nullable',
            'user.doctor_id' => 'nullable',
            'user.weight' => 'nullable|numeric',
            'user.height' => 'nullable|numeric',
            'user.previous_operations' => 'nullable',
            'user.address' => 'nullable',
            'user.allergy' => 'nullable',
            'user.allergy_text' => 'nullable',
            'user.category_id' => 'nullable',
//            'user.medical_history' => 'nullable|boolean',
//            'user.medical_history2' => 'nullable|boolean',
//            'user.medical_history3' => 'nullable|boolean',
//            'user.surgery' => 'nullable|boolean',
//            'user.surgery2' => 'nullable|boolean',
//            'user.surgery3' => 'nullable|boolean',
//            'user.other_diagnosis' => 'nullable',
//            'user.other_surgery' => 'nullable',
//            'user.other_medication' => 'nullable',
//            'user.lab' => 'nullable',
//            'user.international_index' => 'nullable',
//            'user.examination' => 'nullable',
//            'user.impression_recommendation' => 'nullable',
        ]);

        /*
        if ($this->user['medical_history'] == 1) {
            $this->validate([
                'user.medical_history_text' => 'required',
                'user.medical_history_drug' => 'required',
            ]);
        } else {
            $this->user['medical_history_text'] = null;
            $this->user['medical_history_drug'] = null;
        }

        if ($this->user['medical_history2'] == 1) {
            $this->validate([
                'user.medical_history_text2' => 'required',
                'user.medical_history_drug2' => 'required',
            ]);
        } else {
            $this->user['medical_history_text2'] = null;
            $this->user['medical_history_drug2'] = null;
        }

        if ($this->user['medical_history3'] == 1) {
            $this->validate([
                'user.medical_history_text3' => 'required',
                'user.medical_history_drug3' => 'required',
            ]);
        } else {
            $this->user['medical_history_text3'] = null;
            $this->user['medical_history_drug3'] = null;
        }

        if ($this->user['surgery'] == 1) {
            $this->validate([
                'user.surgery_text' => 'required',
                'user.surgery_date' => 'required',
            ]);
        } else {
            $this->user['surgery_text'] = null;
            $this->user['surgery_date'] = null;
        }

        if ($this->user['surgery2'] == 1) {
            $this->validate([
                'user.surgery2_text' => 'required',
                'user.surgery2_date' => 'required',
            ]);
        } else {
            $this->user['surgery2_text'] = null;
            $this->user['surgery2_date'] = null;
        }

        if ($this->user['surgery3'] == 1) {
            $this->validate([
                'user.surgery3_text' => 'required',
                'user.surgery3_date' => 'required',
            ]);
        } else {
            $this->user['surgery3_text'] = null;
            $this->user['surgery3_date'] = null;
        }
        */

        $this->user['user_id'] = auth()->user()->id;

        if (auth()->user()->hasRole('Doctor')) {
            $this->user['doctor_id'] = auth()->id();
        }

        if (isset ($this->user['image'])) {
            $this->validate(['image' => 'image|mimes:jpeg,png,jpg|max:2048']);
            $this->user['image'] = $this->user['image']->store('users/' . $this->id,'public');
        } else {
            unset($this->user['image']);
        }

        $user = User::create($this->user);

        $user->assignRole('Patient');
        $this->emit('success', __("Added successfully"));
        return redirect()->route('admin.users');
    }

    public function render()
    {
        return view('livewire.admin.users.users-create')->layout('layouts.admins.app');
    }
}
