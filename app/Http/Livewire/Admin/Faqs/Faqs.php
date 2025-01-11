<?php

namespace App\Http\Livewire\Admin\Faqs;

use App\Models\Faq;
use Livewire\Component;
use Livewire\WithPagination;

class Faqs extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    protected $listeners = ['refreshModal'];


    public $search, $question, $answer, $deleteId, $faq_id,$create_faq ,$Status;

    public function search()
    {

    }

    function mount(){

    }


    public function deleteId($id)
    {
        $this->deleteId = $id;
    }

    public function EditFaq($id)
    {
        $this->faq_id = $id;
    }

    public function CreateFaq()
    {
        $this->create_faq = rand(0,10000);
    }

    public function Status($id)
    {
        $this->Status = $id;
    }

    public function refreshModal()
    {
        $this->faq_id = "";
        $this->create_faq = "";
    }


    public function delete()
    {

        $faqs = Faq::findOrFail($this->deleteId);

        if (!auth()->user()->can('faqs delete')) {
            $this->emit('error', 'Faq does not have the right permissions.');
            return false;
        }

        $faqs->delete();
        $this->emit('success', __("Deleted successfully"));

    }

    public function render()
    {
        $faqs = Faq::query();

        if ($this->question) {
            $faqs = $faqs->where('question', 'LIKE', '%' . $this->question . '%');
        }
        if ($this->answer) {
            $faqs = $faqs->where('answer', 'LIKE', '%' . $this->answer . '%');
        }

        $faqs = $faqs->orderBy('created_at', "DESC")->paginate(10);
        return view('livewire.admin.faqs.faqs', compact('faqs'))->layout('layouts.admins.app');
    }

}
