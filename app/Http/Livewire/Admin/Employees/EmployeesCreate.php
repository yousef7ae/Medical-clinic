<?php

namespace App\Http\Livewire\Admin\Employees;

use App\Models\Category;
use App\Models\User;
use Livewire\Component;
use Livewire\WithFileUploads;

class EmployeesCreate extends Component
{
    use WithFileUploads;


    public $user, $image,$imageTemp, $role_id, $array ,$categories;

    function mount()
    {
        $this->categories = Category::get();
    }

    public function store()
    {
        $this->validate([
            'user.name' => 'required|string',
            'user.email' => 'required|email|unique:users,email',
            'user.category_id' => 'nullable|exists:categories,id',
            'user.mobile' => 'required|numeric',
            'user.password' => 'required|min:6',
            'user.gender' => 'nullable|in:1,2',
            'user.status' => 'nullable|in:0,1,2',
            'user.birth_date' => 'required',
            'user.job' => 'nullable',
            'user.role_id' => 'required|in:' . implode(',', array_keys(User::employeeRole())) . '|exists:roles,id',
            'user.image' => 'image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $this->user['user_id'] = auth()->user()->id;

        $this->user['password'] = bcrypt($this->user['password']);

        if (isset ($this->user['image'])) {
            $this->user['image'] = $this->user['image']->store('users/' . $this->id,'public');
        } else {
            unset($this->user['image']);
        }

        $user = User::create($this->user);

        $user->syncRoles($this->user['role_id']);

        $this->emit('success', __("Added successfully"));
        $this->user = [];

    }

    public function render()
    {
        return view('livewire.admin.employees.employees-create')->layout('layouts.admins.app');
    }

}
