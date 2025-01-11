<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category;
use App\Models\Consultation;
use App\Models\Post;
use App\Models\Reservation;
use App\Models\User;
use Livewire\Component;

class Home extends Component
{

    public $models, $patients, $reservations, $free_consultation, $paid_consultation, $employees, $categories, $posts;

    public function mount()
    {

        if (auth()->check() and auth()->user()->hasRole('Admin')) {
            $this->patients = User::role('Patient')->count();
            $this->reservations = Reservation::count();
            $this->free_consultation = Consultation::where('type', 1)->count();
            $this->paid_consultation = Consultation::where('type', 2)->count();
            $this->employees = User::role('Employee')->count();
            $this->categories = Category::count();
            $this->posts = Post::count();
        } elseif (auth()->check() and auth()->user()->hasRole('Nurse')) {
            $this->patients = User::role('Patient')->count();
            $this->categories = Category::count();

        } elseif (auth()->check() and auth()->user()->hasRole('Secretarial')) {
            $this->patients = User::role('Patient')->count();
            $this->categories = Category::count();

        } else {
            $this->models = [];
        }

    }

    public function render()
    {
        return view('livewire.admin.home')->layout('layouts.admins.app');
    }
}
