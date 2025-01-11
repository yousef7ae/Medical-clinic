<?php

namespace App\Http\Livewire\Admin\Users;

use App\Models\User;
use Livewire\Component;

class UsersShow extends Component
{
    public $user;

    function mount($id)
    {
        if (auth()->user()->hasRole('Admin')) {
            $this->user = User::role('Patient')->findOrFail($id);
        } elseif (auth()->user()->hasRole('Doctor')) {
            $this->user = User::role('Patient')->where(['id' => $id, 'doctor_id' => auth()->id()])->first();
            if (!$this->user) {
                abort(404);
            }
        } else {
            abort(404);
        }


    }

    public function render()
    {
        return view('livewire.admin.users.users-show')->layout('layouts.admins.app');
    }

}
