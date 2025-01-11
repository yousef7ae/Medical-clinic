<?php

namespace App\Http\Livewire\Admin\Employees;

use App\Models\Category;
use App\Models\User;
use Livewire\Component;
use Livewire\WithFileUploads;

class EmployeesEdit extends Component
{
    use WithFileUploads;

    public $user, $image, $imageTemp, $categories;

    function mount($id)
    {
        $user = User::role(['Doctor', 'Nurse', 'Employee', 'Secretarial', 'Admin'])->findOrFail($id);
        $this->user = $user->toArray();
        $this->user['role_id'] = ($user->roles->count() > 0) ? $user->roles->first()->id : 0;
        $this->categories = Category::get();
    }

    public function update()
    {
        $this->validate([
            'user.name' => 'required|string',
            'user.email' => 'email|unique:users,email,' . $this->user['id'],
            'user.category_id' => 'nullable|exists:categories,id',
            'user.mobile' => 'required|numeric',
            'user.gender' => 'nullable|in:1,2',
            'user.status' => 'nullable|in:0,1,2',
            'user.birth_date' => 'required|date',
            'user.job' => 'nullable',
            'user.role_id' => 'required|in:' . implode(',', array_keys(User::employeeRole())) . '|exists:roles,id',
            'user.address' => 'nullable',
        ]);

        $user = User::findOrFail($this->user['id']);

        if ($this->imageTemp) {
            $this->validate(['imageTemp' => 'image|mimes:jpeg,png,jpg,gif|max:2048']);
            $this->user['image'] = $this->imageTemp->store('users/' . $this->id,'public');
        } else {
            unset($this->user['image']);
        }

        if (!empty($this->user['password']) and $this->user['password'] != "") {
            $this->validate([
                'user.password' => 'required|min:6',
            ]);
            $user->password = bcrypt($this->user['password']);
            $user->save();
            unset($this->user['password']);
        } else {
            unset($this->user['password']);
        }

        $user->update($this->user);
        $this->emit('success', __("Updated successfully"));
        return redirect()->route('admin.employees');
    }

    public function render()
    {
        return view('livewire.admin.employees.employees-edit')->layout('layouts.admins.app');
    }
}
