<?php

namespace App\Http\Livewire\Site;

use App\Models\Ad;
use Livewire\Component;

class Home extends Component
{
    public $ad;

    function mount()
    {
        $this->ad = Ad::where('status',1)->first();
    }

    public function render()
    {
        return view('livewire.site.home')->layout('layouts.site.app');
    }
}
