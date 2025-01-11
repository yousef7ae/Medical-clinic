<?php

namespace App\Http\Livewire\Admin\Sliders;

use App\Models\Slider;
use Livewire\Component;
use Livewire\WithFileUploads;

class SlidersEdit extends Component
{
    use WithFileUploads;

    public $slider, $image, $imageTemp;

    function mount($id)
    {

        $slider = Slider::findOrFail($id);
        $this->slider = $slider->toArray();

    }

    public function update()
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

        $slider = Slider::findOrFail($this->slider['id']);

        $slider->update($this->slider);
        $this->emit('success', __("Updated successfully"));

    }


    public function render()
    {
        return view('livewire.admin.sliders.sliders-edit')->layout('layouts.admins.app');
    }

}
