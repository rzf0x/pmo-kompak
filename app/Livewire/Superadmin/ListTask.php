<?php

namespace App\Livewire\Superadmin;

use App\Models\Task;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class ListTask extends Component
{
    #[Layout('layouts.admin.app')]
    #[Title('Halaman List Project')]

    public function mount()
    {
        //
    }

    #[Computed]
    public function tasks()
    {
        return Task::all();
    }

    public function render()
    {
        return view('livewire.superadmin.list-task');
    }
}
