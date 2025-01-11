<?php

namespace App\Http\Livewire\Admin\Faqs;

use App\Models\Faq;
use Livewire\Component;

class FaqsCreate extends Component
{
    public $faq ;


    public function mount(){

    }

    public function store()
    {
        $this->validate([
            'faq.question' => 'required|string|max:255',
            'faq.answer' => 'required|string|max:2000',
        ]);

        $faq = Faq::create($this->faq);

        $this->emit('success', __("Added successfully"));
        $this->faq = [];

    }


    public function render()
    {

        return view('livewire.admin.faqs.faqs-create')->layout('layouts.admins.app');
    }

}
