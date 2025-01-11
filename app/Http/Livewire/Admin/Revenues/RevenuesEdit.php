<?php

namespace App\Http\Livewire\Admin\Revenues;

use App\Models\Category;
use App\Models\Revenue;
use App\Models\User;
use Livewire\Component;

class RevenuesEdit extends Component
{
    public $revenue, $categories, $patients;

    function mount($id)
    {

        $revenue = Revenue::findOrFail($id);
        $this->revenue = $revenue->toArray();
        $this->patients = User::role('Patient')->get();
        $this->categories = Category::get();


    }

    public function update()
    {
        $this->validate([
            'revenue.revenue_type' => 'required|in:1,2,3,4',
            'revenue.category_id' => 'required|exists:categories,id',
            'revenue.patient_id' => 'required|exists:users,id',
            'revenue.date' => 'required|date',
            'revenue.payment_method' => 'required|in:1,2,3',
            'revenue.check_number' => 'nullable',
            'revenue.check_date' => 'nullable',
            'revenue.notes' => 'nullable',
            'revenue.amount' => 'required|numeric',
        ]);

        $this->revenue['remainder_amount'] = (float)$this->revenue['total_amount'] - (float)$this->revenue['amount'];

        $revenue = Revenue::findOrFail($this->revenue['id']);
        $revenue->update($this->revenue);
        $this->emit('success', __("Updated successfully"));
    }


    public function render()
    {
        $this->revenue['remainder_amount'] = (float)$this->revenue['total_amount'] - (float)$this->revenue['amount'];
        return view('livewire.admin.revenues.revenues-edit')->layout('layouts.admins.app');
    }
}
