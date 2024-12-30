<?php

namespace App\Livewire\Staff;

use App\Models\Project;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class Dashboard extends Component
{
    #[Title('Dashboard Staff')]
    #[Layout('layouts.admin.app')]

    public $taskPlanned, $taskProgress, $taskDone;

    public function mount()
    {
        $dataLogin = Auth::user();

        $this->taskPlanned = Task::where('user_id', $dataLogin->id)->where('status', 'to_do')->count();
        $this->taskProgress = Task::where('user_id', $dataLogin->id)->where('status', 'in_progress')->count();
        $this->taskDone = Task::where('user_id', $dataLogin->id)->where('status', 'done')->count();

        // return dd($this->projects());
    }

    #[Computed]
    public function tasks()
    {
        return Task::where('user_id', Auth::id())
            ->orderBy('created_at', 'desc') // Mengurutkan berdasarkan waktu terbaru
            ->take(5) // Membatasi hanya 5 tugas
            ->get(); // Mengambil hasil
    }

    #[Computed]
    public function projects()
    {
        return Project::where('created_by', Auth::id())
            ->orWhereHas('tasks', function ($query) {
                $query->where('user_id', Auth::id());
            })->get();
    }

    public function render()
    {
        return view('livewire.staff.dashboard');
    }
}
