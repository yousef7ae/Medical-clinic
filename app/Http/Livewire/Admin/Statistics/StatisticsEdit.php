<?php

namespace App\Http\Livewire\Admin\Statistics;

use App\Models\Statistic;
use Livewire\Component;

class StatisticsEdit extends Component
{
    public $statistic ,$image ,$imageTemp;

    function mount($id){
        $statistic = Statistic::findOrFail($id);
        $this->statistic = $statistic->toArray();
    }

    public function update()
    {
        $this->validate([
            'statistic.name' => 'required|string|max:255',
            'statistic.description_' => 'nullable|string|max:2000',
            'statistic.value' => 'required|numeric',
        ]);

        if ($this->imageTemp) {
            $this->validate(['imageTemp' => 'image|mimes:jpeg,png,jpg,gif|max:2048']);
            $this->statistic['image'] = $this->imageTemp->store('statistics/' . $this->id,'public');
        } else {
            unset($this->statistic['image']);
        }

        $statistic = Statistic::findOrFail($this->statistic['id']);
        $statistic->update($this->statistic);
        $this->emit('success','Statistic successfully Added.');
    }


    public function render()
    {
        return view('livewire.admin.statistics.statistics-edit')->layout('layouts.admins.app');
    }

}
