<?php

namespace App\Http\Livewire\Admin\Applicants;

use App\Models\Applicant;
use Livewire\Component;
use Livewire\WithPagination;

class Applicants extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    protected $listeners = ['refreshModal'];

    public $search,$deleteId,$name,$email,$mobile ,$applicant_id;
    public $applicant;

    public function search()
    {

    }

    public function deleteId($id)
    {
        $this->deleteId = $id;
    }

    public function refreshModal()
    {
        $this->applicant_id = "";
    }

    public function delete()
    {

        $applicants = Applicant::findOrFail($this->deleteId);

        if (!auth()->user()->can('applicants delete')) {
            $this->emit('error','applicants does not have the right permissions.');
            return false;
        }

        $applicants->delete();
        $this->emit('success',__("Deleted successfully"));

    }

    public function showNote($id)
    {
        $this->applicant = Applicant::findOrFail($id);

    }

    public function render()
    {
        $applicants = Applicant::query();

//        $applicants = $applicants->whereNotNull('service_id');

        if ($this->name) {
            $applicants = $applicants->where("name", 'LIKE', "%" . $this->name . "%");
        }

        if ($this->email) {
            $applicants = $applicants->where("email", 'LIKE', "%" . $this->email . "%");
        }
        if ($this->mobile) {

            $applicants = $applicants->where("mobile", 'LIKE', "%" . $this->mobile . "%");
        }

        $applicants = $applicants->orderBy('created_at',"DESC")->paginate(10);

        return view('livewire.admin.applicants.applicants', compact('applicants'))->layout('layouts.admins.app');
    }

}
