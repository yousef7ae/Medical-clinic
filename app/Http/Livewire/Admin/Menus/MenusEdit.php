<?php

namespace App\Http\Livewire\Admin\Menus;

use App\Models\Submenu;
use App\Models\Menu;
use Livewire\Component;
use Livewire\WithFileUploads;

class MenusEdit extends Component
{
    use WithFileUploads;

    public $menu, $image, $imageTemp, $submenus = [], $q_deletes = [];

    function mount($id)
    {

        $menu = Menu::findOrFail($id);
        $this->menu = $menu->toArray();

        $submenus = Submenu::where('menu_id', $id)->get();
        $this->submenus = $submenus->toArray();

    }

    public function removeSubmenu($submenu_id)
    {

        unset($this->submenus[$submenu_id]);


    }

    function addSubmenu()
    {

        $this->submenus[] = [
            'name' => "",
            'url' => "",
            'order' => "",

        ];

    }

    public function update()
    {
        $this->validate([
            'menu.title' => 'required',
            'menu.url' => '',
            'menu.order' => '',
            'menu.image' => '',

        ]);

        if ($this->menu['image']) {
            $this->validate([
//                'image' => 'file|image',
                'image' => ''
            ]);

        }

        if ($this->imageTemp) {
            $this->menu['image'] = $this->imageTemp->store('Menus/' . $this->id,'public');
        } else {
            unset($this->menu['image']);
        }

        $menu = Menu::findOrFail($this->menu['id']);
        $menu->update($this->menu);

        $exist_names = [];
        if ($this->submenus) {
            foreach ($this->submenus as $submenu) {
                $exist_names[] = $submenu['name'];
                Submenu::updateOrCreate(
                    [
                        'name' => $submenu['name'],
                        'menu_id' => $menu->id
                    ], [
                    'name' => $submenu['name'],
                    'url' => $submenu['url'],
                    'order' => $submenu['order'],
                    'menu_id' => $menu->id
                ]);

            }
        }

        Submenu::whereNotIn('name', $exist_names)->where('menu_id', $menu->id)->delete();

        $this->emit('success',__("Updated successfully"));

    }


    public function render()
    {

        return view('livewire.admin.menus.menus-edit')->layout('layouts.admins.app');
    }

}
