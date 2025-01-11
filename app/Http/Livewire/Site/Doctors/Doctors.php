<?php

namespace App\Http\Livewire\Site\Doctors;

use App\Models\User;
use Livewire\Component;

class Doctors extends Component
{
    public $doctors;

    public function mount()
    {
        // $this->doctors = User::Role('Doctor')->orderBy('created_at', "DESC")->get();
    }

    public function render()
    {
        return view('livewire.site.doctors.doctors')->layout('layouts.site.app');
    }
}
