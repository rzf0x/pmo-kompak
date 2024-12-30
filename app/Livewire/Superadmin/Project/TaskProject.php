<?php

namespace App\Livewire\Superadmin\Project;

use App\Models\Project;
use App\Models\Task;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class TaskProject extends Component
{
    #[Title('Halaman Task Project')]
    #[Layout('layouts.admin.app')]

    public $project, $taskTodo, $taskProgress, $taskDone, $taskCount;

    public $project_id;

    public function mount($id)
    {
        $this->project_id = $id;
        $this->project = Project::find($this->project_id);

        // Menggunakan selectRaw untuk menghitung jumlah status tugas sekaligus
        $taskCounts = Task::selectRaw('
                SUM(status = "to_do") as task_todo,
                SUM(status = "in_progress") as task_progress,
                SUM(status = "done") as task_done,
                COUNT(*) as task_count
            ')
            ->where('project_id', $this->project_id)
            ->first();

        // Menyimpan hasil query ke dalam properti
        $this->taskTodo = $taskCounts->task_todo;
        $this->taskProgress = $taskCounts->task_progress;
        $this->taskDone = $taskCounts->task_done;
        $this->taskCount = $taskCounts->task_count;
    }

    public function deleteTask($id)
    {
        Task::find($id)->delete();

        return redirect()->route('superadmin.project-task', ['id' => $this->project_id]);
    }

    #[Computed]
    public function tasks()
    {
        return Task::where('project_id', $this->project_id)->get();
    }

    public function render()
    {
        return view('livewire.superadmin.project.task-project');
    }
}
