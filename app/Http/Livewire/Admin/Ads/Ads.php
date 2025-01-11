<?php

namespace App\Http\Livewire\Admin\Ads;

use App\Models\Ad;
use Livewire\Component;
use Livewire\WithPagination;

class Ads extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    protected $listeners = ['refreshModal'];


    public $search, $title, $description, $deleteId, $ad_id ,$image ,$imageTemp ,$Status ,$status ,$create_ad;

    public function search()
    {

    }

    public function mount()
    {
        if(array_key_exists(request('status'),Ad::statusList(false))){
            $this->status = request('status');
        }

    }


    public function deleteId($id)
    {
        $this->deleteId = $id;
    }

    public function EditAd($id)
    {
        $this->ad_id = $id;
    }

    public function CreateAd()
    {
        $this->create_ad =rand(0,10000);
    }

    public function Status($id)
    {
        $this->Status = $id;
    }

    public function active()
    {
        $status = '1';

        $ads = Ad::findOrFail($this->Status);
        $ads->status = $status;

        $ads->save();
        $this->emit('success',__("Activated successfully"));

    }

    public function inactive()
    {

        $status = '0';

        $ads = Ad::findOrFail($this->Status);
        $ads->status = $status;

        $ads->save();
        $this->emit('success',__("Canceled successfully"));


    }


    public function refreshModal()
    {
        $this->ad_id = "";
        $this->create_ad = "";
    }


    public function delete()
    {

        $ads = Ad::findOrFail($this->deleteId);

        if (!auth()->user()->can('ads delete')) {
            $this->emit('error','does not have the right permissions.');
            return false;
        }

        $ads->delete();
        $this->emit('success',__("Deleted successfully"));
    }

    public function acceptable()
    {
        $status = '1';

        $ads = Ad::findOrFail($this->Status);
        $ads->status = $status;

        $ads->save();

        session()->flash('success', 'Ad successfully Acceptable ');

    }

    public function disabled()
    {

        $status = '2';

        $ads = Ad::findOrFail($this->Status);
        $ads->status = $status;

        $ads->save();

        session()->flash('success', 'Ad successfully Disabled ');

    }

    public function render()
    {
        $ads = Ad::query();


        if ($this->title) {
            $ads = $ads->where('title', 'LIKE', '%' . $this->title . '%');
        }

        if ($this->description) {
            $ads = $ads->where('description', 'LIKE', '%' . $this->description . '%');
        }

        if(array_key_exists($this->status,Ad::statusList(false))){
            $ads = $ads->where('status', $this->status);
        }


        $ads = $ads->orderBy('created_at', "DESC")->paginate(10);
        return view('livewire.admin.ads.ads', compact('ads'))->layout('layouts.admins.app');
    }

}
