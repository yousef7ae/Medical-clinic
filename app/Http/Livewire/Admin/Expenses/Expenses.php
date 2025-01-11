<?php

namespace App\Http\Livewire\Admin\Expenses;

use App\Models\Expense;
use Livewire\Component;
use Livewire\WithPagination;

class Expenses extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    protected $listeners = ['refreshModal'];


    public $search, $notes, $name, $deleteId, $expense_id, $create_expense ,$from,$to;

    public function search()
    {
        $this->page = 1;
    }

    public function deleteId($id)
    {
        $this->deleteId = $id;
    }

    public function EditExpense($id)
    {
        $this->expense_id = $id;
    }

    public function CreateExpense()
    {
        $this->create_expense = rand(0, 10000);
    }


    public function refreshModal()
    {
        $this->expense_id = "";
        $this->create_expense = "";
    }


    public function delete()
    {

        $expenses = Expense::findOrFail($this->deleteId);

        if (!auth()->user()->can('expenses delete')) {
            $this->emit('error', 'does not have the right permissions.');
            return false;
        }

        $expenses->delete();
        $this->emit('success', __("Deleted successfully"));

    }

    public function render()
    {
        $expenses = Expense::query();

        if ($this->name) {
            $expenses = $expenses->where('name', 'LIKE', '%' . $this->name . '%');
        }

        if ($this->from && $this->to) {

            $expenses = $expenses->whereBetween('date', [$this->from . " 00:00:00", $this->to . " 23:59:59"]);
        }

        if ($this->notes) {
            $expenses = $expenses->where('notes', 'LIKE', '%' . $this->notes . '%');
        }

        $expenses = $expenses->orderBy('created_at', "DESC")->paginate(10);
        return view('livewire.admin.expenses.expenses', compact('expenses'))->layout('layouts.admins.app');
    }

}
