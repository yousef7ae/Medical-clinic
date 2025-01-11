<?php

namespace App\Http\Livewire\Admin\Categories;

use App\Models\Category;
use App\Models\User;
use Livewire\Component;
use Livewire\WithFileUploads;

class CategoriesEdit extends Component
{
    use WithFileUploads;

    public $category, $image, $imageTemp, $users;

    function mount($id)
    {
        $category = Category::findOrFail($id);
        $this->category = $category->toArray();

        $this->users = User::Role(['Employee', 'Secretarial', 'Doctor'])->get();
    }

    public function update()
    {
        $this->validate([
            'category.name' => 'nullable|string|max:255',
            'category.description' => 'nullable|string|max:255',
            'category.mobile' => 'nullable|numeric',
            'category.user_id' => 'nullable|exists:users,id',
        ]);

        if ($this->imageTemp) {
            $this->validate(['imageTemp' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048']);
            $this->imageTemp->store('categories');
            $this->category['image'] = 'categories/' . $this->imageTemp->hashName();

//            $this->category['image'] = $this->imageTemp->store('categories/' . $this->id);
        } else {
            unset($this->category['image']);
        }

        $category = Category::findOrFail($this->category['id']);
        $category->update($this->category);
        $this->emit('success', __("Updated successfully"));
    }

    function render()
    {
        return view('livewire.admin.categories.categories-edit')->layout('layouts.admins.app');
    }
}
