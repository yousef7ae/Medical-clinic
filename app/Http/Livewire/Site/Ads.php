<?php

namespace App\Http\Livewire\Site;

use App\Models\Ad;
use Livewire\Component;

class Ads extends Component
{

    public $ad_new;

    function mount()
    {
        $this->ad_new = Ad::where('status',1)->first();
    }

    public function render()
    {
        return view('livewire.site.ads')->layout('layouts.site.app');
    }
}
