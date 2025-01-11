<?php

namespace App\Http\Livewire\Site;

use App\Models\Page;
use Livewire\Component;

class About extends Component
{
    public $page, $pages;

    public function mount()
    {
        $this->page = Page::where('slug', 'about')->first();
    }

    public function render()
    {
        return view('livewire.site.about')->layout('layouts.site.app');
    }
}
