<?php

namespace App\Http\Livewire\Admin\Categories;

use App\Models\Category;
use Livewire\Component;

class CategoriesShow extends Component
{
    public $category ;

    function mount($id)
    {
        $this->category = Category::findOrFail($id);
    }

    public function render()
    {
        return view('livewire.admin.categories.categories-show')->layout('layouts.admins.app');
    }

}
