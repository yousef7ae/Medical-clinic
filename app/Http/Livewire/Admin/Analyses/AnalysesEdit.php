<?php

namespace App\Http\Livewire\Admin\Analyses;

use App\Models\Analyse;
use App\Models\Category;
use App\Models\User;
use Livewire\Component;
use Livewire\WithFileUploads;

class AnalysesEdit extends Component
{
    use WithFileUploads;
    public $analyse ,$categories  ,$doctors ,$patients ,$file;

    function mount($id){

        $analyse = Analyse::findOrFail($id);
        $this->analyse = $analyse->toArray();
        if (!auth()->user()->hasRole('Doctor')) {
            $this->doctors = User::role('Doctor')->get();
        }
        $this->patients = User::role('Patient')->get();
        $this->categories = Category::get();

    }

    public function update()
    {
        $this->validate([
            'analyse.name' => 'required',
            'analyse.analyse_number' => 'required',
            'analyse.analyse_result' => 'required',
            'analyse.analyse_date' => 'required',
            'analyse.notes' => '',
            'analyse.patient_id' => '',
            'analyse.category_id' => '',
            'analyse.doctor_id' => '',
            'analyse.user_id' => '',
        ]);

        if ( !empty($this->analyse['file']) and !is_string($this->analyse['file']) ) {
            $this->validate(['analyse.file' => 'max:10240|required|mimes:png,jpeg,pdf']);
            $this->analyse['file'] = $this->analyse['file']->store('analyses/files/'.$this->id,'public');
        }
        else{
            unset($this->analyse['file']);
        }

        $analyse = Analyse::findOrFail($this->analyse['id']);
        $analyse->update($this->analyse);
        $this->emit('success',__("Updated successfully"));
    }


    public function render()
    {
        return view('livewire.admin.analyses.analyses-edit')->layout('layouts.admins.app');
    }

}
