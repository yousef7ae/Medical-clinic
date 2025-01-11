<?php

namespace App\Http\Livewire\Admin\Visits;

use App\Models\Visit;
use Livewire\Component;
use Livewire\WithPagination;

class Visits extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    protected $listeners = ['refreshModal'];


    public $search, $notes,$name, $diagnosis, $deleteId, $visit_id, $image, $imageTemp, $create_visit, $status, $Status;

    public function search()
    {
        $this->page = 1;
    }

    function mount()
    {
        if (array_key_exists(request('status'), Visit::statusList(false))) {
            $this->status = request('status');
        }
    }

    public function Status($id)
    {
        $this->Status = $id;
    }

    public function active()
    {
        $status = '1';
        $visits = Visit::findOrFail($this->Status);
        $visits->status = $status;
        $visits->save();
        $this->emit('success', __("Activated successfully"));

    }

    public function inactive()
    {

        $status = '0';
        $visits = Visit::findOrFail($this->Status);
        $visits->status = $status;
        $visits->save();
        $this->emit('success', __("Canceled successfully"));

    }

    public function soon()
    {

        $status = '2';
        $visits = Visit::findOrFail($this->Status);
        $visits->status = $status;
        $visits->save();
        $this->emit('success', __("Soon successfully"));

    }


    public function deleteId($id)
    {
        $this->deleteId = $id;
    }

    public function EditVisit($id)
    {
        $this->visit_id = $id;
    }

    public function CreateVisit()
    {
        $this->create_visit = rand(0, 10000);
    }


    public function refreshModal()
    {
        $this->visit_id = "";
        $this->create_visit = "";
    }


    public function delete()
    {

        $visits = Visit::findOrFail($this->deleteId);

        if (!auth()->user()->can('visits delete')) {
            $this->emit('error', 'does not have the right permissions.');
            return false;
        }

        $visits->delete();
        $this->emit('success', __("Deleted successfully"));


    }

    public function render()
    {
        $visits = Visit::query();


        if (!auth()->user()->hasRole('Admin')) {
            if (auth()->user()->hasRole('Doctor')) {
                $visits = $visits->where('doctor_id', auth()->id());
            }
        }

        if ($this->notes) {
            $visits = $visits->where('notes', 'LIKE', '%' . $this->notes . '%');
        }
        if ($this->diagnosis) {
            $visits = $visits->where('diagnosis', 'LIKE', '%' . $this->diagnosis . '%');
        }

        if ($this->name) {
            $visits = $visits->whereHas("patient", function ($q) {
                return $q->where('name', 'LIKE', "%" . $this->name . "%");
            });
        }

        if (array_key_exists($this->status, Visit::statusList(false))) {
            $visits = $visits->where('status', $this->status);
        }

        $visits = $visits->orderBy('created_at', "DESC")->paginate(10);
        return view('livewire.admin.visits.visits', compact('visits'))->layout('layouts.admins.app');
    }

}
