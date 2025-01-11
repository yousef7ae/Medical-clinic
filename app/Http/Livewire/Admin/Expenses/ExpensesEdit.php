<?php

namespace App\Http\Livewire\Admin\Expenses;

use App\Models\Expense;
use Livewire\Component;

class ExpensesEdit extends Component
{
    public $expense;

    function mount($id){

        $expense = Expense::findOrFail($id);
        $this->expense = $expense->toArray();
    }

    public function update()
    {
        $this->validate([
            'expense.name' => 'required|string|max:255',
            'expense.amount' => 'required|numeric',
            'expense.date' => 'required|date',
            'expense.notes' => 'nullable',
        ]);

        $this->expense['remainder_amount'] = (float)$this->expense['total_amount'] - (float)$this->expense['amount'];

        $expense = Expense::findOrFail($this->expense['id']);
        $expense->update($this->expense);
        $this->emit('success',__("Updated successfully"));
    }


    public function render()
    {
        $this->expense['remainder_amount'] = (float)$this->expense['total_amount'] - (float)$this->expense['amount'];
        return view('livewire.admin.expenses.expenses-edit')->layout('layouts.admins.app');
    }

}
