<?php

namespace App\Http\Livewire\Admin\Insurances;

use App\Models\Insurance;
use Livewire\Component;

class InsurancesEdit extends Component
{
    public $insurance ;

    function mount($id){
        $insurance = Insurance::findOrFail($id);
        $this->insurance = $insurance->toArray();

    }

    public function update()
    {
        $this->validate([
            'insurance.name' => 'required|string|max:255',
        ]);


        $insurance = Insurance::findOrFail($this->insurance['id']);
        $insurance->update($this->insurance);
        $this->emit('success',__("Updated successfully"));
    }


    public function render()
    {
        return view('livewire.admin.insurances.insurances-edit')->layout('layouts.admins.app');
    }

}
