<?php

namespace App\Http\Livewire\Admin\Menus;

use App\Models\Submenu;
use App\Models\Menu;
use Livewire\Component;
use Livewire\WithFileUploads;

class MenusCreate extends Component
{

    use WithFileUploads;

    public $menu , $image ,$imageTemp ,$submenus=[]  ;


    public function removeSubmenu($submenu_id)
    {

        unset($this->submenus[$submenu_id]);

    }

    function addSubmenu(){

        $this->submenus[] = [
            'name' => "",
            'url' => "",
            'order' => "",

        ];

    }

    public function store()
    {
        $this->validate([
            'menu.title' => 'required',
            'menu.image' => '',
            'menu.order' => '',

        ]);

        if ($this->imageTemp) {
            $this->menu['image'] = $this->imageTemp->store('Menus/'.$this->id,'public');
        }
        else{
            unset($this->menu['image']);
        }

        $menu = Menu::create($this->menu);


        if($this->submenus) {

            foreach ($this->submenus as $submenu) {


                Submenu::create([

                    'name' => $submenu['name'],
                    'url' => $submenu['url'],
                    'order' => $submenu['order'],
                    'menu_id' => $menu->id

                ]);

            }
        }

        $this->emit('success',__("Added successfully"));
        $this->menu = [];
        $this->submenus = [];

    }


    public function render()
    {

        return view('livewire.admin.menus.menus-create')->layout('layouts.admins.app');
    }

}
