<?php

namespace App\Livewire\Superadmin\Project;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class ListLangganan extends Component
{
    #[Title('Halaman List Langganan')]
    #[Layout('layouts.admin.app')]

    public $project;

    public function mount($id)
    {
        $this->project = $id;
    }


    public function render()
    {
        return view('livewire.superadmin.project.list-langganan');
    }
}
