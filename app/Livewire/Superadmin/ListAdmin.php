<?php

namespace App\Livewire\Superadmin;

use App\Models\User;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class ListAdmin extends Component
{
    #[Title('Halaman List Admin')]
    #[Layout('layouts.admin.app')]

    #[Computed]
    public function admins()
    {
        return User::where('role_id', 2)->get();
    }

    public function render()
    {
        return view('livewire.superadmin.list-admin');
    }
}
