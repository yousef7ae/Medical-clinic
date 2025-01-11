<?php

namespace App\Http\Livewire\Admin\Categories;

use App\Models\Category;
use App\Models\User;
use Livewire\Component;
use Livewire\WithFileUploads;

class CategoriesCreate extends Component
{
    use WithFileUploads;

    public $category, $users, $image, $imageTemp;

    function mount()
    {
        $this->users = User::Role(['Employee', 'Secretarial', 'Doctor'])->get();
    }

    public function store()
    {
        $this->validate([
            'category.name' => 'required|string|max:255',
            'category.description' => 'required|string|max:255',
            'category.mobile' => 'required|numeric',
            'category.user_id' => 'nullable|exists:users,id',
        ]);

        if ($this->imageTemp) {
            $this->validate(['imageTemp' => 'image|mimes:jpeg,png,jpg|max:2048']);
            $this->category['image'] = $this->imageTemp->store('categories/' . $this->id, 'public');
        } else {
            unset($this->category['image']);
        }

        Category::create($this->category);

        $this->emit('success', __("Added successfully"));
        $this->category = [];
    }

    public function render()
    {
        return view('livewire.admin.categories.categories-create')->layout('layouts.admins.app');
    }
}
