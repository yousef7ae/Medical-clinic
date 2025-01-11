<?php

namespace App\Http\Livewire\Admin\Applicants;

use App\Models\Applicant;
use App\Models\User;
use Livewire\Component;

class ApplicantsShow extends Component
{
    public $applicant;

    function mount($id)
    {
        $this->applicant = Applicant::findOrFail($id);
    }

    public function render()
    {
        return view('livewire.admin.applicants.applicants-show')->layout('layouts.admins.app');
    }

}
