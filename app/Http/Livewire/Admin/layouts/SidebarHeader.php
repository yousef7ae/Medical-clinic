<?php

namespace App\Http\Livewire\Admin\layouts;

use Livewire\Component;

class SidebarHeader extends Component
{

    public function render()
    {
        return view('livewire.admin.layouts.sidebar-header')->layout('layouts.admins.app');
    }
}
