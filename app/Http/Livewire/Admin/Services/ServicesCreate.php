<?php

namespace App\Http\Livewire\Admin\Services;

use App\Models\Service;
use Livewire\Component;
use Livewire\WithFileUploads;

class ServicesCreate extends Component
{

    use WithFileUploads;

    public $service , $image ,$imageTemp;

    public function store()
    {
        $this->validate([
            'service.title' => 'required',
            'service.description' => '',
            'service.image' => '',
            'service.slug' => '',

        ]);

        if ($this->imageTemp) {
            $this->service['image'] = $this->imageTemp->store('services/'.$this->id,'public');
            $this->validate([ 'imageTemp' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048' ]);
        }
        else{
            unset($this->service['image']);
        }

        $service = Service::create($this->service);

        $this->emit('success',__("Added successfully"));
        $this->service = [];

    }


    public function render()
    {

        return view('livewire.admin.services.services-create')->layout('layouts.admins.app');
    }

}
