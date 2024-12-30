<?php

namespace App\Livewire\Staff\ListTask;

use App\Models\Task;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class EditTask extends Component
{
    #[Title('Halaman edit task')]
    #[Layout('layouts.admin.app')]

    public $task;

    public $title, $project_name, $description, $status, $due_date;

    public function mount($id)
    {
        $this->task = Task::find($id);

        // Data
        $this->title = $this->task->title;
        $this->project_name = $this->task->project->name;
        $this->description = $this->task->description;
        $this->status = $this->task->status;
        $this->due_date = $this->task->due_date;
    }

    public function updateTask()
    {
        // Validate Data
        $this->validate([
            'status' => 'required',
        ]);

        // Update Data
        $this->task->update([
            'status' => $this->status,
        ]);

        return redirect()->route('staff.list-task');
    }

    public function render()
    {
        return view('livewire.staff.list-task.edit-task');
    }
}
