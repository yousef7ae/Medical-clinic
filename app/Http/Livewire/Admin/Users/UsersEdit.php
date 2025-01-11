<?php

namespace App\Http\Livewire\Admin\Users;

use App\Models\Category;
use App\Models\Insurance;
use App\Models\User;
use Livewire\Component;
use Livewire\WithFileUploads;

class UsersEdit extends Component
{

    use WithFileUploads;


    public $user, $image, $imageTemp, $insurances, $categories, $doctors;

    function mount($id)
    {
        if (auth()->user()->hasRole('Admin') or auth()->user()->hasRole('Secretarial')) {
            if (!auth()->user()->hasRole('Doctor')) {
            $this->doctors = User::role('Doctor')->get();
        }
            $this->user = User::role('Patient')->findOrFail($id);
        } elseif (auth()->user()->hasRole('Doctor')) {
            $this->user = User::role('Patient')->where(['id' => $id, 'doctor_id' => auth()->id()])->first();
            if (!$this->user) {
                abort(404);
            }
        } else {
            abort(404);
        }

        $user = User::role('Patient')->findOrFail($id);


        $this->user = $user->toArray();
        $this->user['role_id'] = ($user->roles->count() > 0) ? $user->roles->first()->id : 0;
        $this->categories = Category::get();
        $this->insurances = Insurance::get();


    }

    public function update()
    {


        $this->validate([

            'user.email' => 'nullable|email|unique:users,email,' . $this->user['id'],
            'user.name' => 'required|string',
            'user.mobile' => 'nullable|numeric',
            'user.gender' => 'nullable|in:1,2,3,4,5',
            'user.status' => 'nullable|in:0,1,2',
            'user.birth_date' => 'required|date',
            'user.birth_place' => 'nullable',
            'user.occupation' => 'nullable',
            'user.job' => 'nullable',
            'user.insurance_id' => 'nullable',
            'user.doctor_id' => 'nullable',
            'user.category_id' => 'nullable',
            'user.weight' => 'nullable|numeric',
            'user.height' => 'nullable|numeric',
            'user.previous_operations' => 'nullable',
            'user.address' => 'nullable',
//            'user.id_number' => 'nullable',
//            'user.allergy' => 'nullable',
//            'user.allergy_text' => 'nullable',
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

        $user = User::findOrFail($this->user['id']);

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

        if ($this->imageTemp) {
            $this->validate(['imageTemp' => 'image|mimes:jpeg,png,jpg,gif|max:2048']);
            $this->user['image'] = $this->imageTemp->store('users/' . $this->id,'public');
        } else {
            unset($this->user['image']);
        }

        if (!empty($this->user['password']) and $this->user['password'] != "") {
            $this->validate([
                'user.password' => 'required|min:6',
            ]);
            $user->password = bcrypt($this->user['password']);
            $user->save();
            unset($this->user['password']);
        } else {
            unset($this->user['password']);
        }

        $user->update($this->user);
        $this->emit('success', __("Updated successfully"));
        return redirect()->route('admin.users');


    }

    public function render()
    {
        return view('livewire.admin.users.users-edit')->layout('layouts.admins.app');
    }
}
