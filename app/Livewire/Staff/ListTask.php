<?php

namespace App\Livewire\Staff;

use App\Models\Task;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class ListTask extends Component
{

    #[Title('Halaman List Task')]
    #[Layout('layouts.admin.app')]

    public $taskPlanned, $taskProgress, $taskDone;

    #[Computed]
    public function tasks()
    {
        return Task::where('user_id', Auth::id())
            ->get();
    }

    public function mount()
    {
        $dataLogin = Auth::user();

        $this->taskPlanned = Task::where('user_id', $dataLogin->id)->where('status', 'to_do')->count();
        $this->taskProgress = Task::where('user_id', $dataLogin->id)->where('status', 'in_progress')->count();
        $this->taskDone = Task::where('user_id', $dataLogin->id)->where('status', 'done')->count();
    }

    public function render()
    {
        return view('livewire.staff.list-task');
    }
}
