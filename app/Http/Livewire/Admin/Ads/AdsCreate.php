<?php

namespace App\Http\Livewire\Admin\Ads;

use App\Models\Ad;
use Livewire\Component;
use Livewire\WithFileUploads;

class AdsCreate extends Component
{
    use WithFileUploads;

    public $ad , $image ,$imageTemp;



    public function store()
    {
        $this->validate([
            'ad.title' => 'required|string',
            'ad.description' => '',
            'ad.image' => '',
            'ad.date' => '',
            'ad.status' => '',

        ]);
        if ($this->imageTemp) {
            $this->ad['image'] = $this->imageTemp->store('ads/'.$this->id,'public');
            $this->validate([ 'imageTemp' => 'image|mimes:jpeg,png,jpg,gif|max:2048' ]);
        }
        else{
            unset($this->ad['image']);
        }
        $ad = Ad::create($this->ad);

        $this->emit('success',__("Added successfully"));
        $this->ad = [];

    }


    public function render()
    {
        return view('livewire.admin.ads.ads-create')->layout('layouts.admins.app');
    }

}
