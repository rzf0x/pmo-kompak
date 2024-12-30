<?php

namespace App\Livewire\Superadmin\Project\Task;

use App\Models\Task;
use App\Models\User;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class CreateTask extends Component
{
    #[Layout('layouts.admin.app')]
    #[Title('Halaman tambah tugas')]

    public $project_id, $title, $description, $due_date, $user_id, $status;

    public function store()
    {
        // Validate input
        $this->validate([
            'title' => 'required',
            'description' => 'required',
            'due_date' => 'required',
            'user_id' => 'required',
        ]);

        // Store Data to database
        Task::create([
            'project_id' => $this->project_id,
            'title' => $this->title,
            'description' => $this->description,
            'due_date' => $this->due_date,
            'user_id' => $this->user_id,
            'status' => $this->status,
        ]);

        return redirect()->route('superadmin.project-task', ['id' => $this->project_id]);
    }

    public function mount($id)
    {
        $this->project_id = $id;
        // return dd($this->project_id);
    }

    #[Computed]
    public function users()
    {
        return User::where('role_id', 3)->get();
    }

    public function render()
    {
        return view('livewire.superadmin.project.task.create-task');
    }
}
