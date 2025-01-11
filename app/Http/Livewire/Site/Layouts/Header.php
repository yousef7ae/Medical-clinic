<?php

namespace App\Http\Livewire\Site\Layouts;

use App\Models\Menu;
use Livewire\Component;

class Header extends Component
{
    public $menus;

    function mount(){

        $this->menus = Menu::where('slug',"Header Menu")->first();
    }
    public function render()
    {
        return view('layouts.site.header')->layout('layouts.site.app');
    }
}
