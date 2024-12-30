<?php

namespace App\Livewire\Superadmin\Task;

use App\Models\Project;
use App\Models\Task;
use App\Models\User;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class CreateTask extends Component
{
    #[Title('Halaman Tambah Task')]
    #[Layout('layouts.admin.app')]

    // Task
    public $description, $status, $due_date, $project_id, $user_id, $title;

    public function store()
    {
        // Validate data
        $this->validate([
            'title' => 'required',
            'description' => 'required',
            'status' => 'required',
            'due_date' => 'required',
            'project_id' => 'required',
            'user_id' => 'required',
        ]);

        // Create Task
        Task::create([
            'title' => $this->title,
            'user_id' => $this->user_id,
            'description' => $this->description,
            'status' => $this->status,
            'due_date' => $this->due_date,
            'project_id' => $this->project_id,
        ]);

        return redirect()->route('superadmin.list-task');
    }

    #[Computed]
    public function projects()
    {
        return Project::all();
    }

    #[Computed]
    public function users()
    {
        return User::where('role_id', 3)->get();
    }

    public function render()
    {
        return view('livewire.superadmin.task.create-task');
    }
}
