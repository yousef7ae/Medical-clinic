<?php

namespace App\Http\Livewire\Admin\Services;

use App\Models\Service;
use Livewire\Component;
use Livewire\WithFileUploads;

class ServicesEdit extends Component
{
    use WithFileUploads;

    public $service ,$image ,$imageTemp ;

    function mount($id){

        $service = Service::findOrFail($id);
        $this->service = $service->toArray();

    }

    public function update()
    {
        $this->validate([
            'service.title' => 'required',
            'service.description' => '',
            'service.image' => '',
            'service.status' => '',
            'service.slug' => '',

        ]);

        if($this->service['image']){
            $this->validate([
//                'image' => 'file|image',
                'image' => ''
            ]);

        }

        if ($this->imageTemp) {
            $this->service['image'] = $this->imageTemp->store('services/'.$this->id,'public');
            $this->validate([ 'imageTemp' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048' ]);
        }else{
            unset($this->service['image']);
        }

        $service = Service::findOrFail($this->service['id']);
        $service->update($this->service);
        $this->emit('success',__("Updated successfully"));
    }


    public function render()
    {

        return view('livewire.admin.services.services-edit')->layout('layouts.admins.app');
    }

}
