<?php

namespace App\Livewire\Superadmin;

use App\Models\Customer;
use App\Models\Project;
use App\Models\Revenue;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class CreateProject extends Component
{
    #[Title('Halaman Tambah Project')]
    #[Layout('layouts.admin.app')]

    // Properties Project
    public $project_name, $category, $description, $customer_id, $start_date, $end_date, $amount;

    // Properties Customer
    // public $customer_name, $customer_email, $customer_phone, $customer_address;

    public function store()
    {
        // Validate
        $this->validate([
            'project_name' => 'required',
            'category' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'amount' => 'required',
        ]);

        // Create Project
        $project = Project::create([
            'name' => $this->project_name,
            'category' => $this->category,
            'description' => $this->description,
            'customer_id' => $this->customer_id,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
        ]);

        // Create Revenue
        $revenue = Revenue::create([
            'project_id' => $project->id,
            'amount' => $this->amount,
            'revenue_date' => $this->start_date,
        ]);

        return redirect()->route('superadmin.list-project');
    }

    #[Computed]
    public function customers()
    {
        return Customer::all();
    }

    public function render()
    {
        return view('livewire.superadmin.create-project');
    }
}
