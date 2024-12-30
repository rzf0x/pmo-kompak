<?php

namespace App\Livewire\Superadmin;

use App\Models\User;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class ListStaff extends Component
{
    #[Title('Halaman List Staff')]
    #[Layout('layouts.admin.app')]

    #[Computed]
    public function staffs()
    {
        return User::where('role_id', 3)->get();
    }

    public function render()
    {
        return view('livewire.superadmin.list-staff');
    }
}
