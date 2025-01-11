<?php

namespace App\Http\Livewire\Site\Layouts;

use App\Models\Menu;
use Livewire\Component;

class Footer extends Component
{
    public $services, $sub_menues;

    function mount()
    {
        $menus = Menu::where('slug', "Footer Menu")->first();
        $this->sub_menues = $menus->orderBy('order', 'DESC')->get();
    }

    public function render()
    {
        return view('layouts.site.footer')->layout('layouts.site.app');
    }
}
