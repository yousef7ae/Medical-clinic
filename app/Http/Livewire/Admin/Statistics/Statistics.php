<?php

namespace App\Http\Livewire\Admin\Statistics;

use App\Models\Statistic;
use Livewire\Component;
use Livewire\WithPagination;

class Statistics extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    protected $listeners = ['refreshModal'];


    public $search,$description, $name, $value, $deleteId, $statistic_id ,$create_statistic;

    public function search()
    {

    }

    function mount(){

    }


    public function deleteId($id)
    {
        $this->deleteId = $id;
    }

    public function EditStatistic($id)
    {
        $this->statistic_id = $id;
    }

    public function CreateStatistic()
    {
        $this->create_statistic = rand(0,10000);
    }


    public function refreshModal()
    {
        $this->statistic_id = "";
        $this->create_statistic = "";
    }


    public function delete()
    {

        $statistics = Statistic::findOrFail($this->deleteId);

        if (!auth()->user()->can('statistics delete')) {
            session()->flash('danger', 'Statistic does not have the right permissions.');
            return redirect()->route('admin.statistics');
        }

        $statistics->delete();
        $this->emit('success', 'Statistic successfully Deleted.');


    }

    public function render()
    {
        $statistics = Statistic::query();


        if ($this->name) {
            $statistics = $statistics->where('name', 'LIKE', '%' . $this->name . '%');
        }

        if ($this->description) {
            $statistics = $statistics->where('description', 'LIKE', '%' . $this->description . '%');
        }

        if ($this->value) {
            $statistics = $statistics->where('value', 'LIKE', '%' . $this->value . '%');
        }

        $statistics = $statistics->orderBy('created_at', "DESC")->paginate(10);
        return view('livewire.admin.statistics.statistics', compact('statistics'))->layout('layouts.admins.app');
    }

}
