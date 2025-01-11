<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

class FrontEnd extends Component
{
    public function render()
    {
        return view('livewire.admin.front-end')->layout('layouts.admins.app');
    }
}
