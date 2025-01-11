<?php

namespace App\Http\Livewire\Site\Auth;


use App\Models\Consultation;
use App\Models\User;
use Livewire\Component;


class Register extends Component
{

    public $user ,$consultation;


    public function register()
    {
        $this->validate([
            'user.name' => 'required|string|max:255',
            'user.mobile' => 'nullable|numeric|digits_between:5,20',
            'consultation.type' => 'required|in:1,2',
            'user.city_id' => 'required|in:1,2',
        ]);

        $user = User::create($this->user);
        $user->assignRole('Patient');

        Consultation::create([
            'patient_id'=> $user->id,
            'type'=> $this->consultation['type'],
        ]);

        $this->emit('alertSuccess', __("successfully registered"));
        $this->user = [];

    }
    public function render()
    {
        return view('livewire.site.auth.register')->layout('layouts.site.app');
    }
}
