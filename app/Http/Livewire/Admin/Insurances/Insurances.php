<?php

namespace App\Http\Livewire\Admin\Insurances;

use App\Models\Insurance;
use Livewire\Component;
use Livewire\WithPagination;

class Insurances extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    protected $listeners = ['refreshModal'];


    public $search, $name, $deleteId, $insurance_id, $create_insurance;

    public function search()
    {

    }

    function mount()
    {

    }


    public function deleteId($id)
    {
        $this->deleteId = $id;
    }

    public function EditInsurance($id)
    {
        $this->insurance_id = $id;
    }

    public function CreateInsurance()
    {
        $this->create_insurance = rand(0, 10000);
    }

    public function refreshModal()
    {
        $this->insurance_id = "";
        $this->create_insurance = "";
    }

    public function delete()
    {

        $insurances = Insurance::findOrFail($this->deleteId);

        if (!auth()->user()->can('insurances delete')) {
            $this->emit('error', 'does not have the right permissions.');
            return false;
        }

        $insurances->delete();
        $this->emit('success', __("Deleted successfully"));


    }

    public function render()
    {
        $insurances = Insurance::query();

        if ($this->name) {
            $insurances = $insurances->where('name', 'LIKE', '%' . $this->name . '%');
        }

        $insurances = $insurances->orderBy('created_at', "DESC")->paginate(10);
        return view('livewire.admin.insurances.insurances', compact('insurances'))->layout('layouts.admins.app');
    }

}
