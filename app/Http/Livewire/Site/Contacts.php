<?php

namespace App\Http\Livewire\Site;

use App\Models\Contact;
use Livewire\Component;

class Contacts extends Component
{
    public $contact;

    public function store()
    {
        $this->validate([
            'contact.name' => 'required|string|max:255',
            'contact.email' => 'required_without:contact.mobile|email|max:255',
            'contact.mobile' => 'required_without:contact.email|numeric|digits_between:5,20',
            'contact.subject' => 'required|min:3|max:1000',
            'contact.message' => 'required|min:3|max:2000',
        ]);

        $contact = Contact::create($this->contact);
        $this->contact = [];
        redirect()->route('success-page');
        // $this->emit('alertSuccess',__("success sent"));
    }

    public function render()
    {
        return view('livewire.site.contacts')->layout('layouts.site.app');
    }
}
