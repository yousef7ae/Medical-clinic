<?php

namespace App\Http\Livewire\Admin\Expenses;

use App\Models\Expense;
use Livewire\Component;

class ExpensesCreate extends Component
{
    public $expense = ['payment_method' => 0 ,'remainder_amount' => 0, 'total_amount' => 0, 'amount' => 0];

    public function store()
    {
        $this->validate([
            'expense.name' => 'required|string|max:255',
            'expense.amount' => 'required|numeric',
            'expense.date' => 'required|date',
            'expense.notes' => 'nullable',
            'expense.total_amount' => 'required|numeric',
        ]);

        $this->expense['user_id'] = auth()->user()->id;
        $this->expense['remainder_amount'] = (float)$this->expense['total_amount'] - (float)$this->expense['amount'];

        Expense::create($this->expense);

        $this->emit('success', __("Added successfully"));
        $this->expense = ['payment_method' => 0 ,'remainder_amount' => 0, 'total_amount' => 0, 'amount' => 0];

    }


    public function render()
    {
        $this->expense['remainder_amount'] = (float)$this->expense['total_amount'] - (float)$this->expense['amount'];
        return view('livewire.admin.expenses.expenses-create')->layout('layouts.admins.app');
    }

}
