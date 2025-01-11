<?php

namespace App\Http\Livewire\Site;

use App\Models\Slider;
use Livewire\Component;

class Sliders extends Component
{
    public $sliders ;

    public function mount(){

        $this->sliders = Slider::where('status', 1)->limit(10)->orderBy('created_at', "DESC")->get();

    }

    public function render()
    {
        return view('livewire.site.slider')->layout('layouts.site.app');
    }
}
