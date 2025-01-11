<?php

namespace App\Http\Livewire\Admin\Sliders;

use App\Models\Slider;
use Livewire\Component;
use Livewire\WithFileUploads;

class SlidersCreate extends Component
{

    use WithFileUploads;

    public $slider, $image, $imageTemp;


    public function store()
    {
        $this->validate([
            'slider.name' => 'required',
            'slider.description' => '',
            'slider.image' => '',

        ]);


        if ($this->imageTemp) {
            $this->validate(['imageTemp' => 'image|mimes:jpeg,png,jpg,gif|max:2048']);
            $this->slider['image'] = $this->imageTemp->store('sliders/' . $this->id,'public');
        } else {
            unset($this->slider['image']);
        }

        $slider = Slider::create($this->slider);
        $this->emit('success', __("Added successfully"));
        $this->slider = [];

    }


    public function render()
    {
        return view('livewire.admin.sliders.sliders-create')->layout('layouts.admins.app');
    }

}
