<?php

namespace App\Http\Livewire\Admin\Categories;

use App\Models\Category;
use Livewire\Component;
use Livewire\WithPagination;

class Categories extends Component
{

    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    protected $listeners = ['refreshModal'];

    public $search, $name, $mobile, $image, $deleteId, $category_id, $Status, $status, $create_category, $array;


    public function mount()
    {
        if (array_key_exists(request('status'), Category::statusList(false))) {
            $this->status = request('status');
        }
    }

    public function search()
    {

    }

    public function deleteId($id)
    {
        $this->deleteId = $id;
    }

    public function EditCategory($id)
    {
        $this->category_id = $id;
    }

    public function CreateCategory()
    {
        $this->create_category = rand(0, 10000);
    }

    public function refreshModal()
    {
        $this->category_id = "";
        $this->create_category = "";
    }

    public function Status($id)
    {
        $this->Status = $id;
    }

    public function active()
    {
        $status = '1';
        $categories = Category::findOrFail($this->Status);
        $categories->status = $status;
        $categories->save();
        $this->emit('success', __("Activated successfully"));
    }

    public function inactive()
    {

        $status = '0';
        $categories = Category::findOrFail($this->Status);
        $categories->status = $status;
        $categories->save();
        $this->emit('success', __("Canceled successfully"));
    }

    public function delete()
    {
        $categories = Category::findOrFail($this->deleteId);

        if (!auth()->guard('web')->user()->can('categories delete')) {
            $this->emit('success', 'Category does not have the right permissions.');
            return false;
        }

        $categories->delete();
        $this->emit('success', __("Deleted successfully"));

    }


    public function render()
    {
        $categories = Category::query();

        if ($this->name) {
            $categories = $categories->where("name", 'LIKE', "%" . $this->name . "%");
        }

        if ($this->mobile) {
            $categories = $categories->where("mobile", 'LIKE', "%" . $this->mobile . "%");
        }

        if (array_key_exists($this->status, Category::statusList(false))) {
            $categories = $categories->where('status', $this->status);
        }

        $categories = $categories->orderBy('created_at', "DESC")->paginate(10);

        return view('livewire.admin.categories.categories', compact('categories'))->layout('layouts.admins.app');
    }

}
