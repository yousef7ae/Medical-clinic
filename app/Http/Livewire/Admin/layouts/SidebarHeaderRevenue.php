<?php

namespace App\Http\Livewire\Admin\Layouts;

use Livewire\Component;

class SidebarHeaderRevenue extends Component
{
    public function render()
    {
        return view('livewire.admin.layouts.sidebar-header-revenue')->layout('layouts.admins.app');
    }
}
