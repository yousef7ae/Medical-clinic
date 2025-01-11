<?php

namespace App\Http\Livewire\Site\Categories;

use App\Models\Category;
use Livewire\Component;

class CategoriesSingle extends Component
{
    public $category;

    public function mount($id)
    {
        $this->category = Category::where('id', $id)->first();
    }

    public function render()
    {
        return view('livewire.site.categories.categories-single')->layout('layouts.site.app');
    }
}
