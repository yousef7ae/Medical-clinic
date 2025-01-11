<?php

namespace App\Http\Livewire\Admin\Revenues;

use App\Models\Category;
use App\Models\Revenue;
use App\Models\User;
use Livewire\Component;

class RevenuesCreate extends Component
{
    public $revenue = ['payment_method' => 0 ,'remainder_amount' => 0 , 'total_amount' => 0 , 'amount' => 0] , $patients ,$categories ;

    function mount()
    {
        $this->patients = User::role('Patient')->get();
        $this->categories = Category::get();

    }

    public function store()
    {
        $this->validate([
            'revenue.revenue_type' => 'required|in:1,2,3,4',
            'revenue.category_id' => 'required|exists:categories,id',
            'revenue.patient_id' => 'required|exists:users,id',
            'revenue.date' => 'required|date',
            'revenue.payment_method' => 'required|in:1,2,3',
            'revenue.check_date' => 'nullable',
            'revenue.check_number' => 'nullable',
            'revenue.notes' => 'nullable',
            'revenue.amount' => 'required|numeric',
            'revenue.total_amount' => 'required|numeric',
        ]);

        $this->revenue['remainder_amount'] = (float)$this->revenue['total_amount'] - (float)$this->revenue['amount'];

        $this->revenue['user_id'] = auth()->user()->id;

        Revenue::create($this->revenue);

        $this->emit('success', __("Added successfully"));
        $this->revenue = ['payment_method' => 0 ,'remainder_amount' => 0 , 'total_amount' => 0 , 'amount' => 0 ];

    }


    public function render()
    {
        $this->revenue['remainder_amount'] = (float)$this->revenue['total_amount'] - (float)$this->revenue['amount'];
        return view('livewire.admin.revenues.revenues-create')->layout('layouts.admins.app');
    }

}
