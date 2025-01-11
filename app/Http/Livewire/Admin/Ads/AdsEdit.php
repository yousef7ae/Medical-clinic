<?php

namespace App\Http\Livewire\Admin\Ads;

use App\Models\Ad;
use Livewire\Component;
use Livewire\WithFileUploads;

class AdsEdit extends Component
{
    use WithFileUploads;

    public $ad ,$image ,$imageTemp ;

    function mount($id){

        $ad = Ad::findOrFail($id);
        $this->ad = $ad->toArray();

    }

    public function update()
    {
        $this->validate([
            'ad.title' => 'required|string',
            'ad.description' => '',
            'ad.image' => '',
            'ad.date' => '',

        ]);
        if ($this->imageTemp) {
            $this->ad['image'] = $this->imageTemp->store('ads/'.$this->id,'public');
            $this->validate([ 'imageTemp' => 'image|mimes:jpeg,png,jpg,gif|max:2048' ]);
        }else{
            unset($this->ad['image']);
        }

        $ad = Ad::findOrFail($this->ad['id']);
        $ad->update($this->ad);
        $this->emit('success',__("Updated successfully"));
    }


    public function render()
    {
        return view('livewire.admin.ads.ads-edit')->layout('layouts.admins.app');
    }

}
