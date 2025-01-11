<?php

namespace App\Http\Livewire\Site\Services;

use Livewire\Component;

class Services extends Component
{
    public $services, $page;

    public function mount()
    {
        // $this->services = Service::limit(5)
        //     ->orderBy('created_at', 'DESC')
        //     ->get();
        // $this->page = Page::where('slug', 'services')->first();
    }

    public function render()
    {
        return view('livewire.site.services.services')->layout('layouts.site.app');
    }
}
