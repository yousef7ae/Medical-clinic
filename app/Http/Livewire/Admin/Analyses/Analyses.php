<?php

namespace App\Http\Livewire\Admin\Analyses;

use App\Models\Analyse;
use Livewire\Component;
use Livewire\WithPagination;

class Analyses extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    protected $listeners = ['refreshModal'];


    public $search, $notes,$name_patient, $name, $deleteId, $analyse_id ,$image ,$imageTemp ,$create_analyse ,$status ,$Status;

    public function search()
    {
        $this->page = 1;
    }

    function mount(){
        if (array_key_exists(request('status'), Analyse::statusList(false))) {
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
        $analyses = Analyse::findOrFail($this->Status);
        $analyses->status = $status;
        $analyses->save();
        $this->emit('success',__("Activated successfully"));

    }

    public function inactive()
    {

        $status = '0';
        $analyses = Analyse::findOrFail($this->Status);
        $analyses->status = $status;
        $analyses->save();
        $this->emit('success',__("Canceled successfully"));

    }

    public function soon()
    {

        $status = '2';
        $analyses = Analyse::findOrFail($this->Status);
        $analyses->status = $status;
        $analyses->save();
        $this->emit('success',__("Soon successfully"));

    }


    public function deleteId($id)
    {
        $this->deleteId = $id;
    }

    public function EditAnalyse($id)
    {
        $this->analyse_id = $id;
    }
    public function CreateAnalyse()
    {
        $this->create_analyse = rand(0,10000);
    }


    public function refreshModal()
    {
        $this->analyse_id = "";
        $this->create_analyse = "";
    }


    public function delete()
    {

        $analyses = Analyse::findOrFail($this->deleteId);

        if (!auth()->user()->can('analyses delete')) {
            $this->emit('error','does not have the right permissions.');
            return false;
        }

        $analyses->delete();
        $this->emit('success',__("Deleted successfully"));


    }

    public function render()
    {
        $analyses = Analyse::query();

        if (!auth()->user()->hasRole('Admin')) {
            if (auth()->user()->hasRole('Doctor')) {
                $analyses = $analyses->where('doctor_id', auth()->id());
            }
        }

        if ($this->notes) {
            $analyses = $analyses->where('notes', 'LIKE', '%' . $this->notes . '%');
        }
        if ($this->name) {
            $analyses = $analyses->where('name', 'LIKE', '%' . $this->name . '%');
        }

        if ($this->name_patient) {
            $analyses = $analyses->whereHas("patient", function ($q) {
                return $q->where('name', 'LIKE', "%" . $this->name_patient . "%");
            });
        }

        if(array_key_exists($this->status,Analyse::statusList(false))){
            $analyses = $analyses->where('status', $this->status);
        }

        $analyses = $analyses->orderBy('created_at', "DESC")->paginate(10);
        return view('livewire.admin.analyses.analyses', compact('analyses'))->layout('layouts.admins.app');
    }

}
