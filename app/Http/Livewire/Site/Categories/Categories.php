<?php

namespace App\Http\Livewire\Site\Categories;

use App\Models\Category;
use Livewire\Component;

class Categories extends Component
{
    public $categories;

    public function mount()
    {
        $this->categories = Category::limit(12)->orderBy('created_at', "DESC")->get();
    }

    public function render()
    {
        return view('livewire.site.categories.categories')->layout('layouts.site.app');
    }

}
