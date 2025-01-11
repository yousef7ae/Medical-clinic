<?php

namespace App\Http\Livewire\Admin\Sliders;

use App\Models\Slider;
use Livewire\Component;
use Livewire\WithPagination;

class Sliders extends Component
{
    use WithPagination;

    public $search, $name, $url, $deleteId, $slider_id, $image, $imageTemp, $status, $Status, $create_slider;
    protected $paginationTheme = 'bootstrap';
    protected $listeners = ['refreshModal'];

    public function mount($array = [])
    {
        if (array_key_exists(request('status'), Slider::statusList(false))) {
            $this->status = request('status');
        }
    }

    public function search()
    {

    }

    public function deleteId($id)
    {
        $this->deleteId = $id;
    }

    public function Status($id)
    {
        $this->Status = $id;
    }

    public function active()
    {
        $status = '1';

        $sliders = Slider::findOrFail($this->Status);
        $sliders->status = $status;
        $sliders->save();
        $this->emit('success', __("Activated successfully"));

    }

    public function inactive()
    {

        $status = '0';

        $sliders = Slider::findOrFail($this->Status);
        $sliders->status = $status;
        $sliders->save();
        $this->emit('success', __("Canceled successfully"));

    }

    public function EditSlider($id)
    {
        $this->slider_id = $id;
    }

    public function CreateSlider()
    {
        $this->create_slider = rand(0, 10000);
    }

    public function refreshModal()
    {
        $this->slider_id = "";
        $this->create_slider = "";
    }


    public function delete()
    {

        $sliders = Slider::findOrFail($this->deleteId);

        if (!auth()->user()->can('sliders delete')) {
            $this->emit('error', 'sliders does not have the right permissions.');
            return false;
        }

        $sliders->delete();
        $this->emit('success', __("Deleted successfully"));


    }

    public function render()
    {
        $sliders = Slider::query();


        if ($this->name) {
            $sliders = $sliders->where('name', 'LIKE', '%' . $this->name . '%');
        }

        if (array_key_exists($this->status, Slider::statusList(false))) {
            $sliders = $sliders->where('status', $this->status);
        }

        $sliders = $sliders->orderBy('created_at', "DESC")->paginate(10);
        return view('livewire.admin.sliders.sliders', compact('sliders'))->layout('layouts.admins.app');
    }


}
