<?php

namespace App\Livewire\Superadmin;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class ListVendor extends Component
{
    #[Layout('layouts.admin.app')]
    #[Title('Halaman List Project')]

    public function render()
    {
        return view('livewire.superadmin.list-vendor');
    }
}
