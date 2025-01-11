<?php

namespace App\Http\Livewire\Admin\Faqs;

use App\Models\Faq;
use Livewire\Component;

class FaqsEdit extends Component
{
    public $faq ;

    function mount($id){
        $faq = Faq::findOrFail($id);
        $this->faq = $faq->toArray();
    }

    public function update()
    {
        $this->validate([
            'faq.question' => 'required|string|max:255',
            'faq.answer' => 'required|string|max:2000',
        ]);

        $faq = Faq::findOrFail($this->faq['id']);
        $faq->update($this->faq);
        $this->emit('success',__("Updated successfully"));
    }


    public function render()
    {
        return view('livewire.admin.faqs.faqs-edit')->layout('layouts.admins.app');
    }

}
