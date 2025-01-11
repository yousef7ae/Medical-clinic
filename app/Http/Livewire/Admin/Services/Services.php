<?php

namespace App\Http\Livewire\Admin\Services;

use App\Models\Service;
use App\Models\Slider;
use Livewire\Component;
use Livewire\WithPagination;

class Services extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    protected $listeners = ['refreshModal'];


    public $search, $title, $description, $deleteId, $service_id ,$image ,$imageTemp ,$create_service ,$status ,$Status;

    public function search()
    {
        $this->page = 1;
    }

    function mount(){
        if (array_key_exists(request('status'), Service::statusList(false))) {
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
        $services = Service::findOrFail($this->Status);
        $services->status = $status;
        $services->save();
        $this->emit('success',__("Activated successfully"));

    }

    public function inactive()
    {

        $status = '0';
        $services = Service::findOrFail($this->Status);
        $services->status = $status;
        $services->save();
        $this->emit('success',__("Canceled successfully"));

    }

    public function soon()
    {

        $status = '2';
        $services = Service::findOrFail($this->Status);
        $services->status = $status;
        $services->save();
        $this->emit('success',__("Soon successfully"));

    }


    public function deleteId($id)
    {
        $this->deleteId = $id;
    }

    public function EditService($id)
    {
        $this->service_id = $id;
    }
    public function CreateService()
    {
        $this->create_service = rand(0,10000);
    }


    public function refreshModal()
    {
        $this->service_id = "";
        $this->create_service = "";
    }


    public function delete()
    {

        $services = Service::findOrFail($this->deleteId);

        if (!auth()->user()->can('services delete')) {
            $this->emit('error','does not have the right permissions.');
            return false;
        }

        $services->delete();
        $this->emit('success',__("Deleted successfully"));


    }

    public function render()
    {
        $services = Service::query();

        if ($this->title) {
            $services = $services->where('title', 'LIKE', '%' . $this->title . '%');
        }
        if ($this->description) {
            $services = $services->where('description', 'LIKE', '%' . $this->description . '%');
        }

        if(array_key_exists($this->status,Service::statusList(false))){
            $services = $services->where('status', $this->status);
        }

        $services = $services->orderBy('created_at', "DESC")->paginate(10);
        return view('livewire.admin.services.services', compact('services'))->layout('layouts.admins.app');
    }

}
