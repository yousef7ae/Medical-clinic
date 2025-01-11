<?php

namespace App\Http\Livewire\Admin\Revenues;

use App\Models\Revenue;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class Revenues extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    protected $listeners = ['refreshModal'];

    public $search, $notes, $revenue_type, $deleteId, $revenue_id, $create_revenue ,$patients ,$patient_id;

    public function search()
    {
        $this->page = 1;
    }

    public function deleteId($id)
    {
        $this->deleteId = $id;
    }

    public function EditRevenue($id)
    {
        $this->revenue_id = $id;
    }

    public function CreateRevenue()
    {
        $this->create_revenue = rand(0, 10000);
    }

    public function refreshModal()
    {
        $this->revenue_id = "";
        $this->create_revenue = "";
    }

    public function delete()
    {
        $revenues = Revenue::findOrFail($this->deleteId);

        if (!auth()->user()->can('revenues delete')) {
            $this->emit('error', 'does not have the right permissions.');
            return false;
        }

        $revenues->delete();
        $this->emit('success', __("Deleted successfully"));
    }

    public function render()
    {
        $revenues = Revenue::query();

        $array_admin = [1, 2, 3, 4];
        $array_secretarial = [1, 2];
        $array_nurse = [3, 4];

        if (auth()->user()->hasRole('Admin')) {
            $revenues = $revenues->whereIn('revenue_type', $array_admin);
            $this->patients = User::Role('Patient')->get();
        } elseif (auth()->user()->hasRole('Secretarial')) {
            $revenues = $revenues->whereIn('revenue_type', $array_secretarial);
        } elseif (auth()->user()->hasRole('Nurse')) {
            $revenues = $revenues->whereIn('revenue_type', $array_nurse);
        }

        if ($this->notes) {
            $revenues = $revenues->where('notes', 'LIKE', '%' . $this->notes . '%');
        }

        if ($this->revenue_type) {
            $revenues = $revenues->where('revenue_type', $this->revenue_type);
        }

        $revenues = $revenues->orderBy('created_at', "DESC")->paginate(10);
        return view('livewire.admin.revenues.revenues', compact('revenues'))->layout('layouts.admins.app');
    }
}
