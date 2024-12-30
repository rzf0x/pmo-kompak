<?php

namespace App\Livewire\Superadmin\Task;

use App\Models\Project;
use App\Models\Task;
use App\Models\User;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class EditTask extends Component
{
    #[Layout('layouts.admin.app')]
    #[Title('Halaman Edit Task')]

    public $title, $description, $status, $due_date, $project_id, $task_id, $user_id;

    public $data;

    public function mount($id)
    {
        $this->data = Task::find($id);

        $this->title = $this->data->title;
        $this->description = $this->data->description;
        $this->status = $this->data->status;
        $this->due_date = $this->data->due_date;
        $this->project_id = $this->data->project_id;
        $this->user_id = $this->data->user_id;

        $this->task_id = $id;

        // Simpan URL sebelumnya
        session()->put('previous_url', url()->previous());
    }

    public function updateTask()
    {

        $this->validate([
            'title' => 'required',
            'description' => 'required',
            'status' => 'required',
            'due_date' => 'required',
            'project_id' => 'required',
            'user_id' => 'required',
        ]);

        $this->data->update([
            'title' => $this->title,
            'description' => $this->description,
            'status' => $this->status,
            'due_date' => $this->due_date,
            'project_id' => $this->project_id,
            'user_id' => $this->user_id,
        ]);

        $previousUrl = session()->pull('previous_url', '/default-page');
        return redirect($previousUrl);
    }

    #[Computed]
    public function users()
    {
        return User::where('role_id', '3')->get();
    }

    #[Computed]
    public function projects()
    {
        return Project::all();
    }

    public function render()
    {
        return view('livewire.superadmin.task.edit-task');
    }
}
