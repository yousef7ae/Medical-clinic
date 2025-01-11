<?php

namespace App\Http\Livewire\Site;

use Livewire\Component;

class SuccessPage extends Component
{
    public function render()
    {
        return view('livewire.site.success-page')->layout('layouts.site.app');
    }
}
