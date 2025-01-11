<?php

namespace App\Http\Livewire\Admin\Insurances;

use App\Models\Insurance;
use Livewire\Component;

class InsurancesCreate extends Component
{
    public $insurance;


    public function store()
    {
        $this->validate([
            'insurance.name' => 'required|string|max:255',
        ]);


        Insurance::create($this->insurance);

        $this->emit('success', __("Added successfully"));
        $this->insurance = [];

    }


    public function render()
    {
        return view('livewire.admin.insurances.insurances-create')->layout('layouts.admins.app');
    }

}
