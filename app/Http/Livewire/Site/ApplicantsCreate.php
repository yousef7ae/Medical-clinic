<?php

namespace App\Http\Livewire\Site;

use App\Models\Applicant;
use App\Models\Category;
use Livewire\Component;

class ApplicantsCreate extends Component
{
    public $applicant, $categories;

    protected $listeners = ['refreshModal'];

    function mount()
    {
        $this->categories = Category::get();
    }

    public function refreshModal()
    {

    }

    public function store()
    {
        $this->validate([
            'applicant.name' => 'required|string|min:3|max:70',
            'applicant.email' => 'nullable|email|max:255',
            'applicant.mobile' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:8|max:20',
            'applicant.description' => 'string|max:20000',
            'applicant.category_id' => 'nullable',
            // 'applicant.category_id' => 'required|exists:categories,id',
        ]);

        $applicant = Applicant::create($this->applicant);
        $this->applicant = [];
        redirect()->route('success-page');
        // $this->emit('alertSuccess', __("Your application has been submitted successfully, your application will be reviewed. Thank you"));
    }

    public function render()
    {
        return view('livewire.site.applicants-create')->layout('layouts.site.app');
    }
}
