<?php

namespace App\Livewire\Superadmin\Project;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class ListDokumen extends Component
{
    #[Title('Halaman List Dokumen')]
    #[Layout('layouts.admin.app')]

    public $project;

    public function mount($id)
    {
        $this->project = $id;
    }


    public function render()
    {
        return view('livewire.superadmin.project.list-dokumen');
    }
}
