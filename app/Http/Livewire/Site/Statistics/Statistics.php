<?php

namespace App\Http\Livewire\Site\Statistics;

use App\Models\Statistic;
use Livewire\Component;

class Statistics extends Component
{
    public $statistics;

    public function mount()
    {
        $this->statistics = Statistic::limit(4)->orderBy('created_at', "DESC")->get();
    }

    public function render()
    {
        return view('livewire.site.statistics.statistics')->layout('layouts.site.app');
    }

}
