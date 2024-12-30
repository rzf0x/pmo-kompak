<?php

namespace App\Livewire\Superadmin;

use App\Models\Customer;
use App\Models\Project;
use App\Models\Revenue;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class EditProject extends Component
{
    #[Title('Halaman Edit Project')]
    #[Layout('layouts.admin.app')]

    public $project_name, $project_description, $project_start_date, $project_end_date, $project_status, $project_customer, $project_value;
    public $id;

    public function mount($id)
    {

        // Set ID project
        $this->id = $id;

        // Cari project berdasarkan ID
        $project = Project::find($this->id);

        // Cari revenue berdasarkan project id
        $revenue = Revenue::where('project_id', $this->id)->first();

        // Jika project tidak ditemukan
        if (!$project) {
            return abort(404);
        }

        // return dd($project);

        // Set data project
        $this->project_name = $project->name;
        $this->project_description = $project->description;
        $this->project_start_date = $project->start_date;
        $this->project_end_date = $project->end_date;
        $this->project_status = $project->category;
        $this->project_customer = $project->customer_id;
        $this->project_value = $revenue->amount;
    }

    public function update()
    {
        // Validasi form
        $this->validate([
            'project_name' => 'required',
            'project_description' => 'required',
            'project_start_date' => 'required',
            'project_end_date' => 'required',
            'project_status' => 'required',
            'project_customer' => 'required',
            'project_value' => 'required',
        ]);

        // Cari project berdasarkan ID
        $project = Project::find($this->id);

        // Cari revenue berdasarkan project id
        $revenue = Revenue::where('project_id', $this->id)->first();

        // Jika project tidak ditemukan
        if (!$project) {
            return abort(404);
        }

        // Update data project
        $project->update([
            'name' => $this->project_name,
            'description' => $this->project_description,
            'start_date' => $this->project_start_date,
            'end_date' => $this->project_end_date,
            'category' => $this->project_status,
            'customer_id' => $this->project_customer,
        ]);

        // Update data revenue
        $revenue->update([
            'amount' => $this->project_value,
        ]);

        // Redirect ke halaman list project
        return redirect()->route('superadmin.list-project');
    }

    #[Computed]
    public function customers()
    {
        return Customer::all();
    }

    public function render()
    {
        return view('livewire.superadmin.edit-project');
    }
}
