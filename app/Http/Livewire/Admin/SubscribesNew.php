<?php

namespace App\Http\Livewire\Admin;

use App\Models\SubscribeNews;
use Livewire\Component;

class SubscribesNew extends Component
{


    public $email , $deleteId ,$search ;

    public function search()
    {

    }

    public function deleteId($id)
    {
        $this->deleteId = $id;
    }

    public function delete()
    {
        $subscribe_news = SubscribeNews::findOrFail($this->deleteId);

        if (!auth()->user()->can('subscribes delete')) {
            $this->emit('error','Email does not have the right permissions.');
            return false;
        }
        $subscribe_news->delete();
        $this->emit('success','Email successfully Deleted.');
    }

    public function render()
    {
        $subscribe_news = SubscribeNews::query();

        if ($this->email) {
            $subscribe_news = $subscribe_news->where('email', 'LIKE', '%' . $this->email . '%');
        }

        $subscribe_news = $subscribe_news->orderBy('created_at', "ASC")->paginate(40);

        return view('livewire.admin.subscribes-new',compact('subscribe_news'))->layout('layouts.admins.app');
    }

}
